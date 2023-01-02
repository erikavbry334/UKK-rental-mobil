@extends('userpage.layouts.main', ['title' => 'Catalog - ' . $armada->nama_armada])

@section('content')
    <div class="reservation-form">
        <div class="container">
            <div class="row">
                {{--form pemesanan  --}}
                <div class="col-lg-8 col-md-12 mt-3 " >
                    <h4 style="background: #22b3c1;" class="text-white py-2 text-center">Data Pemesan</h4>
                    <form id="reservation-form" method="POST" action="/checkout">
                        @csrf
                        <input type="hidden" name="id" value="{{ $armada->id }}">
                        <input type="hidden" name="paket_id" value="{{ $paket->id }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="Name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_pemesan" class="Name" placeholder="nama anda"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <label for="chooseDestination" class="form-label">alamat </label>
                                <input type="text" name="alamat" class="Name" placeholder="alamat anda" >
                            </div>
                            <div class="col-lg-5">
                                <fieldset>
                                    <label for="Number" class="form-label">Nomor Handphone</label>
                                    <input type="text" name="no_hp" class="Number" placeholder="nomor aktif"
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <label for="Number" class="form-label">tgl_sewa</label>
                                    <input type="date" name="tgl_pesan" class="date" value="{{ request()->tgl_pesan }}" required readonly>
                                </fieldset>
                            </div>
                            <div class="col-lg-3">
                                <label for="chooseDestination" class="form-label">lama sewa</label>
                                <input type="number" name="lama_sewa" min="1">
                            </div>
                            <div class="col-lg-12">
                                <label for="chooseDestination" class="form-label">Catatan </label>
                                <textarea id="" cols="20" rows="10" placeholder="catatan Lain2" name="catatan"></textarea>
                            </div>
                            <fieldset>
                                <button>pembayaran</button>
                            </fieldset>
                        </div>
                    </form>
                </div>
                {{-- pesanan --}}
                <div class=" col-lg-4 col-md-12 mt-3">
                    <h4 style="background: #22b3c1;" class="text-white py-2 text-center"> Pesanan</em></h4>
                    <form id="reservation-form" name="gs" method="submit" role="search" style="padding: 20px 20px">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="{{ asset($armada->gambar) }}" style="width: 100%; height: 250px; object-fit: cover">
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
                    </form>
                    <label for="check">
                        <input type="checkbox" id="check" name="check">
                        Saya telah setuju dengan <a href="{{ url('syarat-ketentuan') }}">Syarat & Ketentuan</a>
                    </label>
                </div>
            </div>
        </div>
    </div>

@endsection
