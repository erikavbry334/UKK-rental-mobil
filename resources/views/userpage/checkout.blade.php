@extends('userpage.layouts.main', ['title' => 'Catalog'])

@section('content')
    <div class="reservation-form">
        <div class="container">
            <div class="row">
                {{-- data penyewa --}}
                <div class="col-lg-8 col-md-12 ">
                    <h4 style="background: #22b3c1;" class="text-white py-2 text-center">Data Pemesan</h4>
                    <div id="reservation-form" role="search" class="p-2">
                        <div class="row ">
                            <label for="" class="col-sm-3 form-label">nama lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" readonly value="{{ $data['nama_pemesan'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">Alamat</label>
                            <div class="col-lg-9">
                                <input type="text" readonly value="{{ $data['alamat'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">Nomor Handphone</label>
                            <div class="col-lg-9">
                                <input type="text" readonly value="{{ $data['no_hp'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">Tanggal pesan</label>
                            <div class="col-lg-9">
                                <input type="text" readonly value="{{ $data['tgl_pesan'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">Lama sewa</label>
                            <div class="col-lg-9">
                                <input type="text" readonly value="{{ $data['lama_sewa'] }}">
                            </div>
                            <label for="" class="col-sm-3 form-label">catatan tambahan</label>
                            <div class="col-lg-9">
                                <input type="text_area" readonly value="{{ $data['catatan'] }}">
                            </div>
                        </div>
                        </form>
                    </div>


                    {{-- detail pesanan --}}
                </div>
                 <div class=" col-lg-4 col-md-12">
                    <h4 style="background: #22b3c1;" class="text-white py-2 text-center"> Detail Pesanan</em></h4>
                    <form id="reservation-form" name="gs" method="submit" role="search" style="padding: 20px 20px">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="{{ asset($armada->gambar) }}" style="width: 100%; height: 250px; object-fit: cover">
                            </div>
                            <div class="col-lg-12 mt-4">
                                <h4 class="text-start mb-2">{{ $armada->nama_armada }}</h4>
                                <div>{{ $paket->nama_paket }}</div>
                                <h6>Rp {{ number_format($paket->harga + $armada->harga, 0, 0, '.') }}</h6>
                                <div class="line-dec m-3"></div>
                                <ul>
                                    <li>Detail Paket:</li>
                                    @foreach ($paket->detail_pakets as $detail)
                                        <li>{{ $detail->nama }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button id="bayar" class="mt-4" type="button">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        document.querySelector('#bayar').addEventListener('click', function(ev) {
            $.ajax({
                url: '/checkout/charge',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    armada_id: "{{ $armada->id }}",
                    paket_id: "{{ $paket->id }}",
                    nama_pemesan: "{{ $data['nama_pemesan'] }}",
                    no_hp: "{{ $data['no_hp'] }}",
                    alamat: "{{ $data['alamat'] }}",
                    tgl_pesan: "{{ $data['tgl_pesan'] }}",
                    lama_sewa: "{{ $data['lama_sewa'] }}",
                    catatan: "{{ $data['catatan'] }}",
                },
                success: function(data) {
                    snap.pay(data.snap_token, {
                        // Optional
                        onSuccess: function(result) {
                            /* You may add your own js here, this is just example */
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            window.location.href = `/pesanan/${result.order_id}`;
                        },
                        // Optional
                        onPending: function(result) {
                            /* You may add your own js here, this is just example */
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            console.log(result)
                        },
                        // Optional
                        onError: function(result) {
                            /* You may add your own js here, this is just example */
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                            console.log(result)
                        }
                    });
                }
            });
        });
    </script>
@endsection
