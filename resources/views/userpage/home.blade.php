@extends ('userpage.layouts.main', ['title' => 'Home'])
<!-- ***** Main Banner Area Start ***** -->
@include('userpage.partials.slider')
<!-- ***** Main Banner Area End ***** -->

@section('content')
    <div class="weekly-offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Menu Paket</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-weekly-offers owl-carousel">
                        @foreach ($pakets as $paket)
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ $paket->gambar }}" style="object-fit: cover;">
                                    <div class="text" style="width: 240px">
                                        <h4 class="mb-2">{{ $paket->nama_paket }}</h4>
                                        <br>
                                        <h6>Rp {{ number_format($paket->harga, 0, 0, '.') }}</h6>
                                        <div class="line-dec"></div>
                                        <ul class="mt-5">
                                            <li>Detail Paket:</li>
                                            @foreach ($paket->detail_pakets as $detail)
                                                <li>{{ $detail->nama }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="more-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <div class="section-heading text-center" data-aos="fade-right">
                        <h2>Mengapa Sewa Mobil Melalui e-RentCar</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div style="text-align:center" data-aos="fade-left">
                                <img src="assets/images/mudah.png" style="width: 150px">
                                <h4 class="text-center mt-3">Mudah & Fleksibel</h4>
                                <p>Total Guests Yearly</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div style="text-align:center" data-aos="fade-left">
                                <img src="assets/images/murah.png" style="width: 150px">
                                <h4 class="text-center mt-3">Harga Murah</h4>
                                <p>Total Guests Yearly</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div style="text-align:center" data-aos="fade-left">
                                <img src="assets/images/nyaman.png" style="width: 150px">
                                <h4 class="text-center mt-3">Nyaman</h4>
                                <p>Total Guests Yearly</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div style="text-align:center" data-aos="fade-left">
                                <img src="assets/images/banyakpilihan.png" style="width: 150px">
                                <h4 class="text-center mt-3">Banyak Pilihan</h4>
                                <p>Total Guests Yearly</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function bannerSwitcher() {
            next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
            if (next.length) next.prop('checked', true);
            else $('.sec-1-input').first().prop('checked', true);
        }

        var bannerTimer = setInterval(bannerSwitcher, 5000);

        $('nav .controls label').click(function() {
            clearInterval(bannerTimer);
            bannerTimer = setInterval(bannerSwitcher, 5000)
        });

        $(".option").click(function() {
            $(".option").removeClass("active");
            $(this).addClass("active");
        });

        document.addEventListener( 'DOMContentLoaded', function () {
            new Splide('#image-carousel', {
                autoplay: true,
                type: 'loop',
                interval: 3000,
                arrows: false
            }).mount();
        });
    </script>
@endsection
