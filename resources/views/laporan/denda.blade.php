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
        {{-- <div style="background: #1d2c34; text-align: center; padding: 1rem; margin-bottom: 1rem">
            <img src="{{ public_path('assets/images/logo4.png') }}" alt="logo" style="width: 170px;">
        </div> --}}
        <h2>Kwitansi Denda</h2>
        <table>
            <tr>
                <td style="width: 50%">
                    <table>
                        <tr>
                            <td style="padding: 0.25rem">no kwitansi</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">{{ $denda->id }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.25rem">nama lengkap</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">{{ $denda->pesanan->nama_pemesan }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.25rem">Nomor Handphone</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">{{ $denda->pesanan->no_hp }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.25rem">Alamat</td>
                            <td style="padding: 0.25rem">:</td>
                            <td style="padding: 0.25rem">{{ $denda->pesanan->alamat }}</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 50%; padding-left: 2rem; vertical-align: top">
                    <table>
                        <tr>
                            <td style="padding: 0.25rem"><span style="margin-right: 2rem">denda sejumlah</span> :
                                {{ number_format($denda->total_denda, 0, 0, '.') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table style="padding-bottom: 5rem; margin-top: 3rem">
            <tr>
                <td style="width: 80%">
                    <span
                        style="margin-left: 3rem; border: 1px solid #333; padding: 0.5rem; background: #cececed7">Total
                        Denda: Rp
                        {{ number_format($denda->total_denda, 0, 0, '.') }}</span>
                </td>
                <td style="width: 40%; text-align: center">
                    <div>Surabaya, {{ date('d-m-Y') }}</div>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
