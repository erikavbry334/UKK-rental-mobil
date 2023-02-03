@extends('userpage.layouts.main', ['title' => 'Catalog'])


@section('content')
    <div class="reservation-form amazing-deals">
        <div class="row mb-4">
            <div class="col-md-4 px-0">
                <div class="stepper active">
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
                <div class="stepper">
                    <div class="nomor">
                        3
                    </div>
                    <h5>Bayar</h5>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                {{-- filter pencarian --}}
                <div class="col-lg-3 col-md-12">
                    <h3 style="background: #1d2c34;" class="text-white py-1 text-center">Filter Pencarian</h3>
                    <div class="col-lg-12">
                        <div id="reservation-form" role="search" class="p-2">
                            <form action="/catalog" method="GET" class="row">
                                <div class="col-lg-12 my-4">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fas fa-car-alt text-brand icon-circle" style="font-size: 24px"></i>
                                        </div>
                                        <div class="col-10">
                                            <select class="form-control w-100 mb-0" name="armada_id"
                                                placeholder="Pilih Armada">
                                                <option value="">Semua Armada</option>
                                                @foreach ($armadas as $armada)
                                                    <option value="{{ $armada->id }}"
                                                        {{ request()->armada_id == $armada->id ? 'selected' : '' }}>
                                                        {{ $armada->nama_armada }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 my-4">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fas fa-calendar-alt text-brand icon-circle"
                                                style="font-size: 24px"></i>
                                        </div>
                                        <div class="col-10">
                                            <input type="date" name="tgl_pesan" id=""
                                                value="{{ date('Y-m-d') }}" class="form-control mb-0"
                                                value="{{ request()->tgl_pesan }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 my-4">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fas fa-newspaper text-brand icon-circle" style="font-size: 24px"></i>
                                        </div>
                                        <div class="col-10">
                                            <select class="form-control mb-0" name="paket_id" placeholder="Pilih Paket">
                                                <option value="">Semua Paket</option>
                                                @foreach ($pakets as $paket)
                                                    <option
                                                        value="{{ $paket->id }}"{{ request()->paket_id == $paket->id ? 'selected' : '' }}>
                                                        {{ $paket->nama_paket }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- armada tersedia --}}
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($search_armadas))
                                <div class="section-heading text-center">
                                    <h2> Armada Yang Tersedia </h2>
                                </div>
                        </div>
                        @foreach ($search_armadas as $armada)
                            <div class="col-lg-4 col-sm-6">
                                <div class="item p-0">
                                    <img src={{ $armada->gambar }} alt=""
                                        style="object-fit: cover; aspect-ratio: 16/9; width: 100%">
                                    <div class="content px-4">
                                        <h4 class="border-0 mb-0 text-center" style="font-size: 30px ">
                                            {{ $armada->nama_armada }}</h4>
                                        <h4 class="border-0 mb-0 text-center text-brand" style="font-size: 22px">Rp
                                            {{ number_format($armada->harga, 0, 0, '.') }}</h4>
                                        <h6 class="mt-0" style="font-weight: 400">{{ $armada->paket->nama_paket }}</h6>
                                        <div class="d-flex justify-content-between">
                                            <h5 class="text-brand mt-3">Rp
                                                {{ number_format($armada->paket->harga, 0, 0, '.') }}</h5>
                                            <div class="main-button">
                                                <a
                                                    href="{{ url("/catalog/$armada->id?paket_id=" . $armada->paket->id . '&tgl_pesan=' . request()->tgl_pesan . '&jumlah_unit=' . request()->jumlah_unit) }}">Pesan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="section-heading text-center">
                            <h2> Armada Tidak Tersedia </h2>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
