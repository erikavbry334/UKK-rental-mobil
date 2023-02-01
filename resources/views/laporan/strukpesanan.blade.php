<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.35rem;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <div style="padding: 1rem; border: 1px solid #333;">

        <h1 style="text-align: center"> CAREV RENTAL MOBIL </h1>

        <hr>
        <hr>
        {{-- <div style="background: #22b3c1; text-align: center; padding: 1rem; margin-bottom: 1rem">
            <img src="{{ public_path('assets/images/logo4.png') }}" alt="logo" style="width: 170px;">
        </div> --}}
        <h2>Kwitansi Pembayaran</h2>
        <table>
            <tr>
                <td style="width: 50%">
                    <table>
                        <tr>
                            <td style="padding: 0.25rem">no kwitansi</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">{{ $pesanan->id }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.25rem">nama lengkap</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">{{ $pesanan->nama_pemesan }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.25rem">Alamat</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">{{ $pesanan->alamat }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.25rem">Nomor Handphone</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">{{ $pesanan->no_hp }}</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 50%; padding-left: 2rem; vertical-align: top">
                    <table>
                        <tr>
                            <td style="padding: 0.25rem">uang sejumlah</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">
                                {{ number_format($pesanan->paket->harga + $pesanan->armada->harga, 0, 0, '.') }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.25rem">catatan tambahan</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">{{ $pesanan->catatan }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table border="3" cellspacing="0" style="width: 100%; margin: 2rem 0">
            <tr>
                <th>No. Plat</th>
                <th>Armada</th>
                <th>Paket</th>
                <th>Waktu Sewa</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Kembali</th>
            </tr>
            <tr>
                <td style="padding: 0.5rem">{{ $pesanan->armada->no_plat }}</td>
                <td style="padding: 0.5rem">
                    <div>{{ $pesanan->armada->nama_armada }}</div>
                    <div>{{ number_format($pesanan->armada->harga, 0, ',', '.') }}</div>
                </td>
                <td style="padding: 0.5rem">
                    <div>{{ $pesanan->paket->nama_paket }}</div>
                    <div>{{ number_format($pesanan->paket->harga, 0, ',', '.') }}</div>
                </td>
                <td style="padding: 0.5rem; text-align: center">{{ $pesanan->lama_sewa }} hari</td>
                <td style="padding: 0.5rem; text-align: center">{{ $pesanan->tgl_pesan }}</td>
                <td style="padding: 0.5rem; text-align: center">{{ $pesanan->tgl_kembali }}</td>
            </tr>
        </table>

        <table style="padding-bottom: 5rem; margin-top: 3rem">
            <tr>
                <td style="width: 80%">
                    <span
                        style="margin-left: 3rem; border: 1px solid #333; padding: 0.5rem; background: #cececed7">Total
                        Harga: Rp
                        {{ number_format($pesanan->paket->harga + $pesanan->armada->harga, 0, 0, '.') }}</span>
                </td>
                <td style="width: 40%; text-align: center">
                    <div>Surabaya, {{ date('d-m-Y') }}</div>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
