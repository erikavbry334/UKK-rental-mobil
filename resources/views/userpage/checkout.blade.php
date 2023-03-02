@extends('userpage.layouts.main', ['title' => 'Catalog'])

@section('style')
    <style>
        ul,
        li {
            list-style-type: disc !important;
            margin-left: 1rem
        }
    </style>
    <div class="reservation-form">
        <div class="row mb-4">
            <div class="col-md-4 px-0">
                <div class="stepper">
                    <div class="nomor">
                        1
                    </div>
                    <h5>Pilih</h5>
                </div>
            </div>
            <div class="col-md-4 px-0">
                <div class="stepper">
                    <div class="nomor">
                        2
                    </div>
                    <h5>Pesan</h5>
                </div>
            </div>
            <div class="col-md-4 px-0">
                <div class="stepper active">
                    <div class="nomor">
                        3
                    </div>
                    <h5>Bayar</h5>
                </div>
            </div>
        </div>

        <form class="container" action="/checkout/charge" method="POST">
            @csrf
            <div class="row">
                {{-- data penyewa --}}
                <div class="col-lg-8 col-md-12 ">
                    <div id="reservation-form" class="p-0 rounded-4">
                        <h4 style="background: #1d2c34;" class="text-white py-2 text-center">Data Pemesan</h4>
                        <div role="search" class="px-4">
                            <div class="row">
                                <label for="" class="col-sm-3 form-label">nama lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly value="{{ $data['nama_pemesan'] }}" name="nama_pemesan">
                                </div>
                                <label for="" class="col-sm-3 form-label">Alamat</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly value="{{ $data['alamat'] }}" name="alamat">
                                </div>
                                <label for="" class="col-sm-3 form-label">Nomor Handphone</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly value="{{ $data['no_hp'] }}" name="no_hp">
                                </div>
                                <label for="" class="col-sm-3 form-label">Tanggal pesan</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly value="{{ $data['tgl_pesan'] }}" name="tgl_pesan">
                                </div>
                                <label for="" class="col-sm-3 form-label">Lama sewa</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly value="{{ $data['lama_sewa'] }}" name="lama_sewa">
                                </div>
                                <label for="" class="col-sm-3 form-label">catatan tambahan</label>
                                <div class="col-lg-9">
                                    <input type="text_area" readonly value="{{ $data['catatan'] }}" name="catatan">
                                </div>
                                <label for="" class="col-sm-3 form-label">Total harga</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly value="{{ $data['total_harga'] }}" name="total_harga">
                                </div>

                                <input type="hidden" name="armada_id" value="{{ $armada->id }}">
                                <input type="hidden" name="paket_id" value="{{ $paket->id }}">
                                <input type="hidden" name="check" value="{{ $data['check'] }}">
                            </div>
                        </div>
                    </div>


                    {{-- detail pesanan --}}
                </div>
                <div class=" col-lg-4 col-md-12">
                    <div id="reservation-form" class="p-0 rounded-4">
                        <h4 style="background: #1d2c34;" class="text-white py-2 text-center mb-2"> Detail Pesanan</em></h4>
                        <div name="gs" method="submit" role="search" style="padding: 20px 20px">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img src="{{ asset($armada->gambar) }}"
                                        style="width: 100%; height: 250px; object-fit: contain">
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="text-start mb-2">{{ $armada->nama_armada }}<span style="font-weight: 400 !important">({{ $armada->no_plat }})</span></h4>
                                    <div>{{ $paket->nama_paket }}</div>
                                    <h6>Rp {{ number_format($paket->harga + $armada->harga, 0, 0, '.') }}</h6>
                                    <div class="line-dec m-3"></div>
                                    <div>
                                        <h6>Detail Paket:</h6>
                                        <ul style="list-style: disc;">
                                            @foreach ($paket->detail_pakets as $detail)
                                                <li style="list-style: disc; margin-left: 1rem">{{ $detail->nama }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <button id="bayar" class="mt-3" type="submit">Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
                <div>
                    <h5>Catatan:</h5>
                    <ul>
                        <li>Wilayah penggunaan (Pulau Jawa)</li>
                        <li>Syarat & Ketentuan dapat berubah sewaktu-waktu apabila diperlukan</li>
                        <li>Mobil yang disewa diharuskan diambil di kantor kami, serta memberikan syarat-syarat yang
                            sudah ditentukan</li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
@endsection
