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
        })->where('status', 'Tersedia')->get();

        // $armadas = $armadas->filter(function ($armada) {
        //     $is_available = true;
        //     $pesanans = Pesanan::where('armada_id', $armada->id)->get();
        //     foreach ($pesanans as $pesanan) {
        //         $tgl_kembali = Carbon::parse($pesanan->tgl_kembali);
        //         $tgl_pesan_cari = Carbon::parse(request()->tgl_pesan);

        //         if (!isset($pesanan->tgl_kembali)) $is_available = false;

        //         if ($tgl_pesan_cari < $tgl_kembali) $is_available = false;
        //     }

        //     return $is_available;
        // });

        $pakets = Paket::when(isset(request()->paket_id) ?? false, function ($q) {
            $q->where('id', request()->paket_id);
        })->with(['detail_pakets'])->get();

        $search_armadas = collect([]);
        foreach ($armadas as $armada) {
            foreach ($pakets as $paket) {
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

        $armada = Armada::find($request->id);
        $paket = Paket::with(['detail_pakets'])->find(request()->paket_id);

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
            if (Carbon::parse($p->tgl_akhir)->isPast() && $p->status == 3) {
                $is_denda = true;
            }
            $p->is_denda = $is_denda;
            return $p;
        });
        return view('userpage.profile', compact('pesanans'));
    }
    
    public function syaratKetentuan() {
      $syarats = SyaratKetentuan::get();
    
      return view("userpage.syarat-ketentuan", compact("syarats"));
    }

}    
