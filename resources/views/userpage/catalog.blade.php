@extends('userpage.layouts.main', ['title' => 'Catalog'])

@include('userpage.partials.slider')

@section('content')
    <div class="amazing-deals">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
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
                                            <div class="col-6">
                                                <h5 class="text-info">Rp. {{ number_format($armada->harga, 0, 0, '.') }}
                                                </h5>
                                            </div>
                                        </div>
                                        <i class="fas fa-fw fa-chart-area"></i>
                                        <i class="fas fa-fw fa-chart-area"></i>
                                        <i class="fas fa-fw fa-chart-area"></i>
                                        <div class="main-button">
                                            <a href="{{ url("/catalog/$armada->id?paket_id=" . $armada->paket->id . "&tgl_pesan=" . request()->tgl_pesan . "&jumlah_unit=" . request()->jumlah_unit) }}">Pesan</a>
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
@endsection
