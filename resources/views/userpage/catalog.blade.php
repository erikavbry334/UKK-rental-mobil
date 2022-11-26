@extends('userpage.layouts.main', ['title' => 'Catalog'])


@section('content')
    <div class="reservation-form">
        <div class="container">
            <div class="row">
                {{-- filter pencarian --}}
                <div class="col-lg-3 col-md-12">
                    <h3 style="background: #22b3c1;" class="text-white py-1 text-center">Filter Pencarian</h3>
                    <div class="col-lg-12">
                        <div id="reservation-form" role="search" class="p-2">
                            <form action="/catalog" method="GET" class="row">
                                <div class="col-lg-12 ">
                                    <i class="fa fa-user"></i>
                                    <span>Armada:</span><br>
                                    <select class="form-control w-100" name="armada_id" placeholder="Pilih Armada">
                                        <option value="">Semua Armada</option>
                                        @foreach ($armadas as $armada)
                                            <option value="{{ $armada->id }}"
                                                {{ request()->armada_id == $armada->id ? 'selected' : '' }}>
                                                {{ $armada->nama_armada }}</option>
                                        @endforeach
                                    </select>
                                    </h4>
                                </div>
                                <div class="col-lg-12 ">
                                    <i class="fa fa-globe"></i>
                                    <span>tanggal:</span><br>
                                    <input type="date" name="tgl_pesan" id="" value="{{ date('Y-m-d') }}"
                                        class="form-control" value="{{ request()->tgl_pesan }}" required>
                                    </h4>
                                </div>
                                <div class="col-lg-12 ">
                                    <i class="fa fa-globe"></i>
                                    <span>paket:</span><br>
                                    <select class="form-control" name="paket_id" placeholder="Pilih Paket">
                                        <option value="">Semua Paket</option>
                                        @foreach ($pakets as $paket)
                                            <option
                                                value="{{ $paket->id }}"{{ request()->paket_id == $paket->id ? 'selected' : '' }}>
                                                {{ $paket->nama_paket }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
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
                            <div class="section-heading text-center">
                                <h2> Armada Yang Tersedia </h2>
                            </div>
                        </div>
                        @foreach ($search_armadas as $armada)
                            <div class="col-lg-6 col-sm-6">
                                <div class="item">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="image">
                                                <img src="{{ $armada->gambar }}" style="object-fit: cover; height: 100%">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 align-self-center">
                                            <div class="content">
                                                <h4 style="font-size: 30px">{{ $armada->nama_armada }}</h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="text-info">Rp.
                                                            {{ number_format($armada->harga, 0, 0, '.') }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <i class="fas fa-solid fa-users"></i>
                                                <i class="icon-detail-grey icon-fuel" ></i>
                                                <i class="fas fa-fw fa-chart-home"></i>
                                                <div class="main-button">
                                                    <a
                                                        href="{{ url("/catalog/$armada->id?paket_id=" . $armada->paket->id . '&tgl_pesan=' . request()->tgl_pesan . '&jumlah_unit=' . request()->jumlah_unit) }}">Pesan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
