<section id="section-1" style="
    display: flex;
    justify-content: center;
    align-items: center;
">
    <div class="">
        <div class="slider">
            <div id="top-banner-1" class="banner">
                <div class="banner-inner-wrapper header-text">
                    <div class="main-caption text-center">
                        <h2 class="text-white">Take a Glimpse Into The Beautiful Country Of:</h2>
                        <h1 class="text-white mb-4">Caribbean</h1>
                    </div>
                    <div class="container">
                        <div class="more-info">
                            <form action="/catalog" method="GET" class="row">
                                <div class="col-lg-4 col-sm-6 col-6 d-flex">
                                    <i class="fa fa-user"></i>
                                    <h4 class="flex-fill">
                                        <span>Armada:</span><br>
                                        <select class="form-control w-100" name="armada_id" placeholder="Pilih Armada">
                                            <option value="">Semua Armada</option>
                                            @foreach ($armadas as $armada)
                                                <option value="{{ $armada->id }}" {{ request()->armada_id == $armada->id ? "selected" : "" }}>{{ $armada->nama_armada }}</option>
                                            @endforeach
                                        </select>
                                    </h4>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-6 d-flex">
                                    <i class="fa fa-globe"></i>
                                    <h4 class="flex-fill">
                                        <span>tanggal:</span><br>
                                        <input type="date" name="tgl_pesan" id="" value="{{ date('Y-m-d') }}" class="form-control" value="{{ request()->tgl_pesan }}" required>
                                    </h4>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-6 d-flex">
                                    <i class="fa fa-home"></i>
                                    <h4>
                                        <span>jumlah unit:</span><br>
                                        <input type="number" name="jumlah_unit" id="" value="{{ request()->jumlah_unit }}" class="form-control" style="width: 80px" required>
                                    </h4>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-6 d-flex">
                                    <i class="fa fa-globe"></i>
                                    <h4>
                                        <span>paket:</span><br>
                                        <select class="form-control" name="paket_id" placeholder="Pilih Paket">
                                            <option value="">Semua Paket</option>
                                            @foreach ($pakets as $paket)
                                                <option value="{{ $paket->id }}"{{ request()->paket_id == $paket->id ? "selected" : "" }} >{{ $paket->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                    </h4>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">Cari</button>
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
