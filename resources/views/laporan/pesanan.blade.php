<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pesanan</title>
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <div style="background: #22b3c1; text-align: center; padding: 1rem; margin-bottom: 1rem">
        <img src="{{ public_path('assets/images/logo4.png') }}" alt="logo" style="width: 170px;">
    </div>
    <h2 style="text-align: center">Laporan Pesanan Penyewaan Mobil</h1>
    <h5 style="text-align: center; font-weight: 400">Periode Bulan {{ $data['bulan'] }} {{ $data['tahun'] }}</h5>
    <table cellspacing="0" cellpadding="4" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Tanggal Pesan</th>
                <th>Armada (Paket)</th>
                <th>Total harga</th>
                <th>Total denda</th>
                <th>Jumlah Seluruh </th>
            </tr>
        </thead>
        <tbody>
            {{ $total_pendapatan = 0; }}
            @foreach ($pesanans as $i => $pesanan)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $pesanan->nama_pemesan }}</td>
                    <td>{{ $pesanan->tgl_pesan }}</td>
                    <td>{{ $pesanan->armada->nama_armada }}({{ $pesanan->paket->nama_paket }})</td>
                    <td>Rp.{{ $pesanan->total_harga }}</td>
                    <td>Rp.{{ isset($pesanan->denda) ? $pesanan->denda->total_denda : 0 }}</td>
                    <td>Rp.{{ $pesanan->total_harga + (isset($pesanan->denda) ? $pesanan->denda->total_denda : 0) }}</td>
                    {{ $total_pendapatan += ($pesanan->total_harga + (isset($pesanan->denda) ? $pesanan->denda->total_denda : 0)) }}
                </tr>
            @endforeach
            <tr>
                <td colspan="6" style="text-align: right">
                    <strong >Total Pendapatan</strong>
                </td>
                <td>
                   Rp.{{$total_pendapatan}}
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
