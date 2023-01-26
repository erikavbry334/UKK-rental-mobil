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
    </style>
</head>

<body>
    <h1>Tes</h1>
    <table>
        <tr>
            <td style="width: 50%">
                <h4 style="background: #22b3c1; margin: 0; color: #fff; padding: 0.75rem">Data Pemesan</h4>
                <div style="border: 1px solid #22b3c1;">
                    <table>
                        <tr>
                            <td style="padding: 0.5rem 0.25rem">nama lengkap</td>
                            <td style="padding: 0.5rem 0.25rem">:</td>
                            <td style="padding: 0.5rem 0.25rem">{{ $pesanan->nama_pemesan }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.5rem 0.25rem">Alamat</td>
                            <td style="padding: 0.5rem 0.25rem">:</td>
                            <td style="padding: 0.5rem 0.25rem">{{ $pesanan->alamat }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.5rem 0.25rem">Nomor Handphone</td>
                            <td style="padding: 0.5rem 0.25rem">:</td>
                            <td style="padding: 0.5rem 0.25rem">{{ $pesanan->no_hp }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.5rem 0.25rem">catatan tambahan</td>
                            <td style="padding: 0.5rem 0.25rem">:</td>
                            <td style="padding: 0.5rem 0.25rem">{{ $pesanan->catatan }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 0.5rem 0.25rem">Statuse</td>
                            <td style="padding: 0.5rem 0.25rem">:</td>
                            <td style="padding: 0.5rem 0.25rem">
                                @if ($pesanan->status == 1)
                                    <span class="badge" style="background: #f6c23e">{{ $pesanan->status_text }}</span>
                                @elseif ($pesanan->status == 2)
                                    <span class="badge" style="background: #4e73df">{{ $pesanan->status_text }}</span>
                                @elseif ($pesanan->status == 3)
                                    <span class="badge" style="background: #4e73df">{{ $pesanan->status_text }}</span>
                                @elseif ($pesanan->status == 4)
                                    <span class="badge" style="background: #4e73df">{{ $pesanan->status_text }}</span>
                                @elseif ($pesanan->status == 5)
                                    <span class="badge" style="background: #1cc88a; color: #fff">{{ $pesanan->status_text }}</span>
                                @elseif ($pesanan->status == 6)
                                    <span class="badge" style="background: #e74a3b">{{ $pesanan->status_text }}</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="width: 50%; padding-left: 2rem">
                <div>
                    <div>
                        <h4>Detail Pesanan</h4>
                    </div>
                    <div>
                        <table>
                            <td style="width: 40%">
                                <img src="{{ public_path($pesanan->armada->gambar) }}" style="max-width: 100%">

                            </td>
                            <td>
                                <div>
                                    <h4 style="margin: 0">{{ $pesanan->armada->nama_armada }}</h4>
                                    <h6 style="margin: 0">{{ $pesanan->paket->nama_paket }}</h6>
                                    <h5 style="margin: 0; color: #22b3c1">Rp
                                        {{ number_format($pesanan->paket->harga + $pesanan->armada->harga, 0, 0, '.') }}
                                    </h5>
                                </div>
                            </td>
                        </table>
                    </div>
                    <div style="margin-top: -2rem">
                        <ul>
                            @foreach ($pesanan->paket->detail_pakets as $detail)
                                <li>{{ $detail->nama }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
