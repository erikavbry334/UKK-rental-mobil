<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index() {
        return view('dashboard.laporan.index');
    }

    public function cetak(Request $request) {
        $data = $request->validate([
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

        $bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $pesanans = Pesanan::whereMonth('tgl_pesan', $data['bulan'])->whereYear('tgl_pesan', $data['tahun'])->get();
        
        $data['bulan'] = $bulans[$data['bulan'] - 1];
        $pdf = Pdf::loadView('laporan.pesanan', compact('pesanans', 'data'));
        return $pdf->download('Laporan Pesanan.pdf');
    }
}
