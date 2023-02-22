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
                        <img src="{{ asset('assets/images/banner.jpg') }}"
                            style="width: 100%; height: 100%; object-fit: cover">
                        <div class="slider-content">
                            <div data-aos="fade-up" data-aos-delay="500">
                                <h1 data-aos="fade-left" class="text-center" style="color: #fcf9da">Sewa Mobil Murah </h1>
                                <h3 data-aos="fade-left" class="text-center" style="color: #fcf9da">Di Surabaya</h3>
                                <p lass="text-center" style="color: #fcf9da">Dapatkan penawaran khusus sekarang!</p>
                                <div class="main-button text-start">
                                    <a href="/kontakkami"> kontak kami </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide position-relative">
                        <img src="{{ asset('assets/images/banner-01.jpg') }}"
                            style="width: 100%; height: 100%; object-fit: cover">
                        <div class="slider-content">
                            <div data-aos="fade-up" data-aos-delay="500">
                                <h1 data-aos="fade-left" style="color: #fcf9da">Sewa Mobil <br>Lepas Kunci Tanpa Ribet
                                </h1>
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
        <div class="slider position-relative" style="z-index: 10">
            <div class="container bg-white p-0 shadow" style="margin-top: -3rem">
                <form action="/catalog" method="GET" class="row w-100 m-0">
                    <div class="col-lg-4 col-sm-6 col-12 p-0 d-flex align-items-center pt-4" style="box-shadow: 1px 0 0 0 #acacb3">
                        <div style="height: 48px; width: 48px; border: 1px solid #db636f; transform: translateY(-0.5rem)" class="ms-3 me-3 d-flex justify-content-center align-items-center rounded-circle">
                            <i class="fas fa-car-alt fs-4" style="color: #db636f;"></i>
                        </div>
                        <h6 class="flex-fill">
                            <span style="color: #aeaeae; font-weight: 400; text-transform: uppercase; letter-spacing: 1px">Armada</span><br>
                            <select class="form-control px-0 w-100 border-0" name="armada_id" placeholder="Pilih Armada" style="height: 60px;">
                                <option value="">Semua Armada</option>
                                @foreach ($armadas as $armada)
                                    <option value="{{ $armada->id }}"
                                        {{ request()->armada_id == $armada->id ? 'selected' : '' }}>
                                        {{ $armada->nama_armada }}</option>
                                @endforeach
                            </select>
                        </h6>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 p-0 d-flex align-items-center pt-4" style="box-shadow: 1px 0 0 0 #acacb3">
                        <div style="height: 48px; width: 48px; border: 1px solid #db636f; transform: translateY(-0.5rem)" class="ms-3 me-3 d-flex justify-content-center align-items-center rounded-circle">
                            <i class="fas fa-calendar-alt fs-4" style="color: #db636f;"></i>
                        </div>
                        <h6 class="flex-fill">
                            <span style="color: #aeaeae; font-weight: 400; text-transform: uppercase; letter-spacing: 1px">Tanggal</span><br>
                            <input type="date" name="tgl_pesan" id="" value="{{ date('Y-m-d') }}" style="height: 60px;"
                                class="form-control px-0 tgl_pesan border-0" value="{{ request()->tgl_pesan }}" required>
                        </h6>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 p-0 d-flex align-items-center pt-4">
                        <div style="height: 48px; width: 48px; border: 1px solid #db636f; transform: translateY(-0.5rem)" class="ms-3 me-3 d-flex justify-content-center align-items-center rounded-circle">
                            <i class="fas fa-newspaper fs-4" style="color: #db636f;"></i>
                        </div>
                        <h6 class="flex-fill">
                            <span style="color: #aeaeae; font-weight: 400; text-transform: uppercase; letter-spacing: 1px">Paket</span><br>
                            <select class="form-control px-0 border-0" name="paket_id" placeholder="Pilih Paket" style="height: 60px;">
                                <option value="">Semua Paket</option>
                                @foreach ($pakets as $paket)
                                    <option
                                        value="{{ $paket->id }}"{{ request()->paket_id == $paket->id ? 'selected' : '' }}>
                                        {{ $paket->nama_paket }}</option>
                                @endforeach
                            </select>
                        </h6>
                    </div>
                    <div class="col-lg-2 p-0">
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-0 h-100"
                            style="background: #db636f; border-color: #db636f">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
