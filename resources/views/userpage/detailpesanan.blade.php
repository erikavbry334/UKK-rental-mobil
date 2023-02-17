@extends('userpage.layouts.main', ['title' => 'detail pesanan'])

@section('content')
    <div class="reservation-form">
        <div class="container">
            <div class="row">
                {{-- data penyewa --}}
                <div class="col-lg-7 col-md-12 ">
                    <h4 style="background: #1d2c34;" class="text-white py-2 text-center">Data Pemesan</h4>
                    <div id="reservation-form" role="search" class="p-2">
                        <div class="row ">
                            <label for="" class="col-sm-3 form-label">nama lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" readonly value="{{ $pesanan['nama_pemesan'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">Alamat</label>
                            <div class="col-lg-9">
                                <input type="text" readonly value="{{ $pesanan['alamat'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">Nomor Handphone</label>
                            <div class="col-lg-9">
                                <input type="text" readonly value="{{ $pesanan['no_hp'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">Tanggal pesan</label>
                            <div class="col-lg-9">
                                <input type="text" readonly
                                    value="{{ $pesanan['tgl_pesan'] }} s.d {{ $pesanan['tgl_akhir'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">catatan tambahan</label>
                            <div class="col-lg-9">
                                <input type="text_area" readonly value="{{ $pesanan['catatan'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">Status</label>
                            <div class="col-lg-9">
                                @if ($pesanan->status == 1)
                                    <td>
                                        <span class="badge bg-warning">{{ $pesanan->status_text }}</span>
                                    </td>
                                @elseif ($pesanan->status == 2)
                                    <td>
                                        <span class="badge bg-primary">{{ $pesanan->status_text }}</span>
                                    </td>
                                @elseif ($pesanan->status == 3)
                                    <td>
                                        <span class="badge bg-primary">{{ $pesanan->status_text }}</span>
                                    </td>
                                @elseif ($pesanan->status == 4)
                                    <td>
                                        <span class="badge bg-success">{{ $pesanan->status_text }}</span>
                                    </td>
                                @elseif ($pesanan->status == 5)
                                    <td>
                                        <span class="badge bg-danger">{{ $pesanan->status_text }}</span>
                                    </td>
                                @endif
                            </div>
                            @if ($pesanan->is_denda)
                                <label for="" class="col-sm-3 form-label">Denda</label>
                                <div class="col-lg-9">
                                    <input type="text_area" readonly value="{{ $pesanan['total_denda'] }}">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- detail pesanan --}}
                <div class="col-lg-5 col-md-12">
                    <form id="reservation-form" name="gs" method="submit" role="search" class="p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Detail Pesanan</em></h4>
                            </div>
                            <div class="col-lg-5">
                                <img src="{{ asset($pesanan->armada->gambar) }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-3">
                                <h4 class="text-start mb-1">{{ $pesanan->armada->nama_armada }}</h4>
                                <h6>{{ $pesanan->paket->nama_paket }}</h6>
                                <div class="line-dec">
                                    <h5 class="text-primary">Rp
                                        {{ number_format($pesanan->paket->harga + $pesanan->armada->harga, 0, 0, '.') }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ul>
                                    @foreach ($pesanan->paket->detail_pakets as $detail)
                                        <li>{{ $detail->nama }}</li>
                                    @endforeach
                                </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if ($pesanan->status == 1)
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
        </script>
        <script>
            snap.pay('{{ $pesanan->pembayaran->snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    window.location.href = `/pesanan/${result.order_id}`;
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        </script>
    @endif
@endsection
