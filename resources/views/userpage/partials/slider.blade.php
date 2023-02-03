<section id="section-1" style="
    display: flex;
    justify-content: center;
    align-items: center;
">
    <div class="">
        <section id="image-carousel" class="splide" aria-label="Beautiful Images">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide position-relative">
                        <img src="{{ asset('assets/images/banner-02.jpg') }}" style="width: 100%; height: 100%; object-fit: cover">
                        <div class="slider-content">
                            <div data-aos="fade-up" data-aos-delay="500">
                                <h1 data-aos="fade-left" style="color: #fcf9da">Sewa Mobil murah </h1>
                                <h3 data-aos="fade-left" style="color: #fcf9da">Di Surabaya</h3>
                                <p style="color: #fcf9da">Dapatkan penawaran khusus sekarang!</p>
                                <div class="main-button text-start">
                                    <a href="/kontakkami"> kontak kami </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide position-relative">
                        <img src="{{ asset('assets/images/banner-01.jpg') }}" style="width: 100%; height: 100%; object-fit: cover">
                        <div class="slider-content">
                            <div data-aos="fade-up" data-aos-delay="500">
                                <h1 data-aos="fade-left" style="color: #fcf9da">Sewa Mobil <br>Lepas Kunci Tanpa Ribet</h1>
                                <p style="color: #fcf9da">tersedia armada aman dan nyaman</p>
                                <div class="main-button text-start">
                                    <a href="/kontakkami"> kontak kami </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- <li class="splide__slide position-relative">
                        <img src="{{ asset('assets/images/banner-01.jpg') }}" alt="">
                    </li> --}}
                </ul>
            </div>
        </section>
        <div class="slider">
            <div id="top-banner-1" class="banner">
                <div class="banner-inner-wrapper header-text">
                    <div class="container">
                        <div class="more-info">
                            <form action="/catalog" method="GET" class="row">
                                <div class="col-lg-4 col-sm-6 col-12 d-flex">
                                    <i class="fas fa-car-alt"></i>
                                    <h4 class="flex-fill">
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
                                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                                    <i class="fas fa-calendar-alt"></i>
                                    <h4 class="flex-fill">
                                        <span>tanggal:</span><br>
                                        <input type="date" name="tgl_pesan" id=""
                                            value="{{ date('Y-m-d') }}" class="form-control"
                                            value="{{ request()->tgl_pesan }}" required>
                                    </h4>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                                    <i class="fas fa-newspaper"></i>
                                    <h4 class="flex-fill">
                                        <span>paket:</span><br>
                                        <select class="form-control" name="paket_id" placeholder="Pilih Paket">
                                            <option value="">Semua Paket</option>
                                            @foreach ($pakets as $paket)
                                                <option
                                                    value="{{ $paket->id }}"{{ request()->paket_id == $paket->id ? 'selected' : '' }}>
                                                    {{ $paket->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                    </h4>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-4" style="background: #db636f; border-color: #db636f">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
