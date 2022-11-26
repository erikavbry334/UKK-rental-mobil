@extends('userpage.layouts.main', ['title' => 'detail pesanan'])

@section('content')
   <div class="reservation-form">
        <div class="container">
            <div class="row">
                {{-- data penyewa --}}
                <div class="col-lg-7 col-md-12 ">
                    <h4 style="background: #22b3c1;" class="text-white py-2 text-center">Data Pemesan</h4>
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
                                <input type="text" readonly value="{{ $pesanan['tgl_pesan'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">Lama sewa</label>
                            <div class="col-lg-9">
                                <input type="text" readonly value="{{ $pesanan['lama_sewa'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">catatan tambahan</label>
                            <div class="col-lg-9">
                                <input type="text_area" readonly value="{{ $pesanan['catatan'] }}">
                            </div>
                        </div>
                        </form>
                    </div>

                    {{-- detail pesanan --}}
                </div>
                <div class="col-lg-5 col-md-12">
                    <form id="reservation-form" name="gs" method="submit" role="search" class="p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Detail Pesanan</em></h4>
                            </div>
                            <div class="col-lg-5">
                                <img src="{{ asset($pesanan->$armada->gambar) }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-3">
                                <h4 class="text-start mb-1">{{ $pesanan->$armada->nama_armada }}</h4>
                                <h6>{{ $paket->nama_paket }}</h6>
                                <div class="line-dec">
                                    <h5 class="text-primary">Rp
                                        {{ number_format($pesanan->$paket->harga + $pesanan->$armada->harga, 0, 0, '.') }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ul>
                                    @foreach ($pesanan->$paket->detail_pakets as $detail)
                                        <li>{{ $detail->nama }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <button id="bayar">Bayar Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if ($pesanan->status == 1)
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            snap.pay('{{ $pesanan->pembayaran->snap_token }}');
        </script>
    @endif
@endsection