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
                @php
                    $fmt = new NumberFormatter('id_ID', NumberFormatter::PADDING_POSITION);
                @endphp
                @foreach ($pakets as $paket)
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 paket-card">
                            <img src="{{ $paket->gambar }}" class="card-img-top img-fluid rounded-3"
                                style="height: 480px; object-fit: cover">
                            <div class="card-body">
                                <h5 class="text-red-brand harga">Rp {{ $fmt->format($paket->harga) }}</h5>
                                <h2 class="text-white fw-bold">{{ $paket->nama_paket }}</h2>
                                <ul>
                                    @foreach ($paket->detail_pakets as $detail)
                                        <li class="my-2 fs-5">{{ $detail->nama }}</li>
                                    @endforeach
                                    <li class="syarat">
                                        <a href="syarat-ketentuan">Syarat & Ketentuan <i class="fa fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="card-body">
                                <div class="d-flex justify-content-between flex-wrap">
                                    <h4 class="text-dark fw-bold">{{ $paket->nama_paket }}</h4>
                                    <h2 class="text-red-brand fw-normal">Rp {{ $fmt->format($paket->harga) }}</h2>
                                </div>
                                <ul class="mt-4 ps-4">
                                    @foreach ($paket->detail_pakets as $detail)
                                        <li>{{ $detail->nama }}</li>
                                    @endforeach
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="divider">
        <h1 class="text-white">Jasa Rental Mobil Terbaik & Profesional Di Kota Surabaya</h1>
    </div>

    <div class="more-about mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center pb-5" data-aos="fade-right">
                        <h2>Mengapa Sewa Mobil Melalui CAREV ?</h2>
                    </div>
                    <div class="row">
                        {{-- <div class="col-lg-3">
                            <div class="px-3" style="text-align:center" data-aos="fade-left">
                            <div class="card border-0 card-service">
                                <div class="card-body text-center py-5 d-flex align-items-center flex-column">
                                    <div class="icon">
                                        <img src="assets/images/mudah.png" style="width: 75px">
                                    </div>
                                    <h4 class="text-center mt-5">Mudah & Fleksibel</h4>
                                </div>
                            </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-3">
                            <div class="px-4" style="text-align:center" data-aos="fade-left">
                                <div class="card shadow border-0 card-service">
                                    <div class="card-body text-center py-5">
                                        <img src="assets/images/mudah.png" style="width: 100px">
                                        <h5 class="text-center mt-5">Mudah & Fleksibel</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="px-4" style="text-align:center" data-aos="fade-left">
                                <div class="card shadow border-0 card-service">
                                    <div class="card-body text-center py-5">
                                        <img src="assets/images/murah.png" style="width: 100px">
                                        <h5 class="text-center mt-5">Harga Murah</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="px-4" style="text-align:center" data-aos="fade-left">
                                <div class="card shadow border-0 card-service">
                                    <div class="card-body text-center py-5">
                                        <img src="assets/images/nyaman.png" style="width: 100px">
                                        <h5 class="text-center mt-5">Nyaman</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="px-4" style="text-align:center" data-aos="fade-left">
                                <div class="card shadow border-0 card-service">
                                    <div class="card-body text-center py-5">
                                        <img src="assets/images/banyakpilihan.png" style="width: 100px">
                                        <h5 class="text-center mt-5">Banyak Pilihan</h5>
                                    </div>
                                </div>
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

        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#image-carousel', {
                autoplay: true,
                type: 'loop',
                interval: 3000,
                arrows: false,
                pagination: false
            }).mount();

            let date = new Date().getDate() + 1;
            if (date < 10) {
                date = `0${date}`;
            }
            let month = new Date().getMonth() + 1;
            if (month < 10) {
                month = `0${month}`;
            }
            let year = new Date().getFullYear();
            $('.tgl_pesan').flatpickr({
                minDate: `${year}-${month}-${date}`,
                defaultDate: `${year}-${month}-${date}`
            })
        });
    </script>
@endsection
