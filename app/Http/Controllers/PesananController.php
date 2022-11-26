<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Armada;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\Midtrans\CreateSnapTokenService;

class PesananController extends Controller
{
    public function index(Request $request)
    {    $pesanans = Pesanan::where(function ($q) use ($request) {
            $q->where('nama_pemesan', 'LIKE', '%' . $request->search . '%');
        })->get();
        return view('dashboard.pesanan.index', [
            'pesanans'=> $pesanans,
            'request' => $request

        ]);
    }

    public function charge(Request $request)
    {
        $data = $request->validate([
            'armada_id' => 'required',
            'paket_id' => 'required',
            'nama_pemesan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tgl_pesan' => 'required',
            'lama_sewa' => 'required|numeric',
            'catatan' => 'nullable',

        ]);

        $data['tgl_akhir'] = Carbon::parse($data['tgl_pesan'])->addDays($data['lama_sewa']);
        
        $armada = Armada::find($data['armada_id']);
        $paket = Paket::find($data['paket_id']);
        $data['total_harga'] = $armada->harga + $paket->harga;
        $data['user_id'] = auth()->user()->id;

        $pesanan = Pesanan::create($data);

        $midtrans = new CreateSnapTokenService($pesanan);
        $snapToken = $midtrans->getSnapToken();

        Pembayaran::create(['pesanan_id' => $pesanan->id, 'snap_token' => $snapToken]);

        return response()->json(['snap_token' => $snapToken]);
    }

    public function detail($id)
    {
        $pesanan = Pesanan::find($id);
        return view('userpage.detailpesanan', compact('pesanan'));
    }

    public function batal($id) {
        Pesanan::where('id', $id)->update(['status' => 5]);
        return redirect('/profile');
    }
}
