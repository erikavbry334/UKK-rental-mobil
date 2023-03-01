<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armada;
use App\Models\Paket;
use App\Models\Pesanan;
use App\Models\SyaratKetentuan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    public function __construct() {
        $armadas = Armada::get();
        $pakets = Paket::with(['detail_pakets'])->get();
        View::share('armadas', $armadas);
        View::share('pakets', $pakets);
    }

    public function home () {
        return view('userpage.home');
    }

    public function catalog(Request $request) {
        if (!isset($request->tgl_pesan)) {
            return redirect('/');
        }

        $armadas = Armada::when(isset(request()->armada_id) ?? false, function ($q) {
            $q->where('id', request()->armada_id);
        })->get();

        $armadas = $armadas->filter(function ($armada) {
            $is_available = true;
            $pesanans = Pesanan::where('armada_id', $armada->id)->get();
            foreach ($pesanans as $pesanan) {
                $pesanan = Pesanan::where('status', '!=', '6')->where('status', '!=', '5')->where('status', '!=', '4')->where('armada_id', $armada->id)->whereDate('tgl_pesan', '<=', request()->tgl_pesan)->get();
                if ($pesanan->count()) $is_available = false;
            }

            return $is_available;
        });

        $pakets = Paket::when(isset(request()->paket_id) ?? false, function ($q) {
            $q->where('id', request()->paket_id);
        })->with(['detail_pakets'])->get();

        $search_armadas = collect([]);
        foreach ($pakets as $paket) {
            foreach ($armadas as $armada) {
                $armd = $armada->replicate();
                $armd->id = $armada->id;
                $armd->paket = $paket;
                $search_armadas->push($armd);
            }
        }

        return view('userpage.catalog', [
            'search_armadas' => $search_armadas->all()
     ]);
    }

    public function catalogDetail($id) {
        $armada = Armada::find($id);
        $paket = Paket::with(['detail_pakets'])->find(request()->paket_id);

        return view('userpage.catalog_detail', [
            'armada' => $armada,
            'paket' => $paket
        ]);
    }

    public function checkout(Request $request) {
        $data = $request->validate([
            'id' => 'required',
            'paket_id' => 'required',
            'nama_pemesan' => 'required',
            'no_hp' => 'required',
            'lama_sewa' => 'required',
            'alamat' =>'required',
            'tgl_pesan' => 'required',
            'catatan' => 'nullable',
            'check' => 'required'
        ]);

        $data['tgl_akhir'] = Carbon::parse($data['tgl_pesan'])->addDays($data['lama_sewa'])->format('Y-m-d');

        $pesanans = Pesanan::where('status', '!=', '6')->where('status', '!=', '5')->where('status', '!=', '4')->where('armada_id', $request->id)->where(function ($q) use ($data) {
            // tgl pesan <= tgl pesan cari <= tgl akhir
            $q->whereDate('tgl_pesan', '<=', $data['tgl_pesan'])->whereDate('tgl_akhir', '>=', $data['tgl_pesan']);
            // tgl pesan <= tgl akhir cari
            $q->orWhereDate('tgl_pesan', '<=', $data['tgl_akhir']);
        })->get();

        if (count($pesanans)) {
            return back()->with('error', 'Pemesanan untuk tanggal ' . $data['tgl_pesan'] . ' sudah ada');
        }
        if (Carbon::parse($data['tgl_pesan'])->subDay()->endOfDay()->isPast()) {
            return back()->with('error', 'Minimal tanggal pemesanan adalah hari ini');
        }

        $armada = Armada::find($request->id);
        $paket = Paket::with(['detail_pakets'])->find(request()->paket_id);
        $data['total_harga'] = ($armada->harga * $data['lama_sewa']) + $paket->harga;

        return view('userpage.checkout', [
            'armada' => $armada,
            'paket' => $paket,
            'data' => $data
        ]);
    }

    public function profile() {
        $pesanans = Pesanan::where('user_id', auth()->user()->id)->get();
        $pesanans = $pesanans->map(function ($p) {
            $is_denda = false;
            if (Carbon::parse($p->tgl_akhir)->endOfDay()->isPast() && $p->status == 3) {
                $is_denda = true;
            }
            $p->is_denda = $is_denda;

            if (isset($p->denda)) {
                $p->is_denda = true;
            }
            return $p;
        });
        return view('userpage.profile', compact('pesanans'));
    }
    
    public function syaratKetentuan() {
      $syarat = SyaratKetentuan::first();
    
      return view("userpage.syarat-ketentuan", compact("syarat"));
    }

}    
