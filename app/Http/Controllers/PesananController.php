<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Armada;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Models\Denda;
use Barryvdh\DomPDF\Facade\Pdf;


class PesananController extends Controller
{
    public function index(Request $request, $status = null)
    {   
        $per = $request->per ? $request->per : 10;

        $pesanans = Pesanan::where(function ($q) use ($request) {
            $q->where('nama_pemesan', 'LIKE', '%' . $request->search . '%');
        })->when(isset($status) ?? false, function ($q) use ($status) {
            $q->where('status', $status);
        })->paginate($per);
        $pesanans->map(function ($p) {
            $is_denda = false;
            if (Carbon::parse($p->tgl_akhir)->isPast() && ($p->status == 3 || $p->status == 4)) {
                $is_denda = true;
            }
            $p->is_denda = $is_denda;
        });
        return view('dashboard.pesanan.index', [
            'pesanans'=> $pesanans,
            'request' => $request,
            'status' => $status
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
            'check' => 'required',

        ]);

        $data['tgl_akhir'] = Carbon::parse($data['tgl_pesan'])->addDays($data['lama_sewa']);
        
        $armada = Armada::find($data['armada_id']);
        $paket = Paket::find($data['paket_id']);
        $data['total_harga'] = ($armada->harga * $data['lama_sewa']) + $paket->harga;
        $data['user_id'] = auth()->user()->id;

        $pesanan = Pesanan::create($data);

        $midtrans = new CreateSnapTokenService($pesanan);
        $snapToken = $midtrans->getSnapToken();

        Pembayaran::create(['pesanan_id' => $pesanan->id, 'snap_token' => $snapToken]);

        $armada->update(['status' => 'Disewa']);

        return redirect('/pesanan/' . $pesanan->uuid);
    }

    public function detail($uuid)
    {
        $pesanan = Pesanan::where('uuid', $uuid)->first();
        $is_denda = false;
        $total_denda = 0;
        if (Carbon::parse($pesanan->tgl_akhir)->isPast() && $pesanan->status == 3) {
            $is_denda = true;
            $telat_berapa_hari = Carbon::parse($pesanan->tgl_akhir)->diff(now())->format('%a');
            $total_denda = $telat_berapa_hari * 50000;
        }
        $pesanan->is_denda = $is_denda;
        $pesanan->total_denda = $total_denda;
        return view('userpage.detailpesanan', compact('pesanan'));
    }

    public function batal($id) {
        Pesanan::where('id', $id)->update(['status' => 6]);
        Armada::where('id', Pesanan::find($id)->armada_id)->update(['status' => 'Tersedia']);
        return redirect('/profile');
    }

    // update status pesanan oleh admin
    public function updateStatus(Request $request, $id) {
        $data = $request->validate([
            'status' => 'required'
        ]);

        $pesanan = Pesanan::where('id', $id)->first();
        if ($data['status'] == '4') { // telah dikembalikan
            $data['tgl_kembali'] = now();

            if ($pesanan->tgl_akhir < $data['tgl_kembali']) {
                $telat_berapa_hari = Carbon::parse($pesanan->tgl_akhir)->diff($data['tgl_kembali'])->format('%a');
                $total_denda = $telat_berapa_hari * 50000;
                Denda::create([
                    'pesanan_id' => $pesanan->id,
                    'telat_berapa_hari' => $telat_berapa_hari,
                    'total_denda' => $total_denda
                ]);
            }
        }
        $pesanan->update($data);

        if ($data['status'] == 4 || $data['status'] == 6) {
            Armada::where('id', $pesanan->armada_id)->update(['status' => 'Tersedia']);
        }

        return redirect('/dashboard/pesanan/' . $request->status);
    }

    public function dashboardDetail($id)
    {
        $pesanan = Pesanan::find($id);
        return view('dashboard.pesanan.detail', compact('pesanan'));
    }

    public function cetak($id) {
        $pesanan = pesanan::with(['armada', 'paket'])->where('id',$id)->first();
        $pdf = Pdf::loadView('laporan.strukpesanan', compact('pesanan'))->setPaper('a4', 'landscape');
        return $pdf->download('Struk Pesanan.pdf');
    }
}
