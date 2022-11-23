@extends('userpage.layouts.main', ['title' => 'Catalog'])

@section('content')
    <div class="reservation-form">
        <div class="container">
            <div class="row">
                {{-- detail pesanan --}}
                <div class="col-lg-6 col-md-6">
                    <form id="reservation-form" name="gs" method="submit" role="search" class="p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Detail Pesanan</em></h4>
                            </div>
                            <div class="col-lg-5">
                                <img src="{{ asset($armada->gambar) }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-3">
                                <h4 class="text-start mb-1">{{ $armada->nama_armada }}</h4>
                                <h6>{{ $paket->nama_paket }}</h6>
                                <div class="line-dec">
                                    <h5 class="text-primary">Rp
                                        {{ number_format($paket->harga + $armada->harga, 0, 0, '.') }}</h5>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                @foreach ($paket->detail_pakets as $detail)
                                    <li>{{ $detail->nama }}</li>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
                {{-- data penyewa --}}
                <div class="col-lg-6 col-md-12">
                    <form id="reservation-form" name="gs" method="submit" role="search" class="p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>data pemesan</em></h4>
                            </div>
                            <div class="col-lg-12">
                                <label for="">nama lengkap</label>
                                <input type="text" readonly value="{{ $data['nama_pemesan'] }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="">Nomor Handphone</label>
                                <input type="text" readonly value="{{ $data['no_hp'] }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="">Alamat</label>
                                <input type="text" readonly value="{{ $data['alamat'] }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="">jumlah unit</label>
                                <input type="text" readonly value="{{ $data['jumlah_unit'] }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="">Tanggal pesan</label>
                                <input type="text" readonly value="{{ $data['tgl_pesan'] }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="">Lama sewa</label>
                                <input type="text" readonly value="{{ $data['lama_sewa'] }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="">catatan tambahan</label>
                                <input type="text" readonly value="{{ $data['catatan'] }}">
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
