@extends('userpage.layouts.main', ['title' => 'Catalog - ' . $armada->nama_armada])

@section('content')
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
                <div class="stepper active">
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
            <form class="row" method="POST" action="/checkout">
                {{-- form pemesanan  --}}
                <div class="col-lg-8 col-md-12 mt-3 ">
                    <h4 style="background: #1d2c34;" class="text-white py-2 text-center">Data Pemesan</h4>
                    <div id="reservation-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $armada->id }}">
                        <input type="hidden" name="paket_id" value="{{ $paket->id }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="Name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_pemesan" class="Name" placeholder="nama anda"
                                        autocomplete="off" required value="{{ old('nama_pemesan') }}">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <label for="chooseDestination" class="form-label">alamat </label>
                                <input type="text" name="alamat" class="Name" placeholder="alamat anda"
                                    value="{{ old('alamat') }}" autocomplete="off">
                            </div>
                            <div class="col-lg-5">
                                <fieldset>
                                    <label for="Number" class="form-label">Nomor Handphone</label>
                                    <input type="number" name="no_hp" class="Number" placeholder="nomor aktif"
                                        autocomplete="off" required value="{{ old('no_hp') }}">
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="Number" class="form-label">tgl_sewa</label>
                                    <input type="date" name="tgl_pesan" class="date" value="{{ request()->tgl_pesan }}"
                                        required readonly value="{{ old('tgl_pesan') }}" autocomplete="off">
                                </fieldset>
                            </div>
                            <div class="col-lg-3">
                                <label for="chooseDestination" class="form-label">lama sewa</label>
                                <input type="number" name="lama_sewa" min="1" value="{{ old('lama_sewa') }}" autocomplete="off">
                            </div>
                            <div class="col-lg-12">
                                <label for="chooseDestination" class="form-label">Catatan </label>
                                <textarea id="" cols="20" rows="10" placeholder="catatan Lain2" name="catatan">{{ old('catatan') }}</textarea>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="check" class="d-flex align-items-center">
                                    <input type="checkbox" class="mb-0" id="check" name="check"
                                        style="width: 16px; height: 16px" required>
                                    <span class="ms-2">Saya telah setuju dengan <a class="text-danger"
                                            href="{{ url('syarat-ketentuan') }}">Syarat & Ketentuan</a></span>
                                </label>
                            </div>
                            <fieldset>
                                <button>pembayaran</button>
                            </fieldset>
                        </div>
                    </div>
                </div>
                {{-- pesanan --}}
                <div class=" col-lg-4 col-md-12 mt-3">
                    <h4 style="background: #1d2c34;" class="text-white py-2 text-center"> Pesanan</em></h4>
                    <div id="reservation-form" name="gs" method="submit" role="search" style="padding: 20px 20px">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="{{ asset($armada->gambar) }}"
                                    style="width: 100%; height: 250px; object-fit: cover">
                            </div>
                            <div class="col-lg-12">
                                <h4 class="text-start mb-2">{{ $armada->nama_armada }}</h4>
                                <div>{{ $paket->nama_paket }}</div>
                                <h6>Rp {{ number_format($paket->harga + $armada->harga, 0, 0, '.') }}</h6>
                                <div class="line-dec m-3"></div>
                                <ul style="list-style: disc;">
                                    <li>Detail Paket:</li>
                                    @foreach ($paket->detail_pakets as $detail)
                                        <li style="list-style: disc; margin-left: 1rem">{{ $detail->nama }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
