@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header d-flex w-100 py-3">
                <h3 class="m-0 font-weight-bold text-primary">

                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- data penyewa --}}
                    <div class="col-lg-7 col-md-12 ">
                        <h4 style="background: #1d2c34; color: #db636f" class="py-2 text-center mb-0">Data Pemesan</h4>
                        <div id="reservation-form" role="search" class="p-2" style="border: 1px solid #f8f9fc;">
                            <div class="row ">
                                <label for="" class="col-sm-3 form-label">nama lengkap</label>
                                <div class="col-sm-9">
                                    : {{ $pesanan['nama_pemesan'] }}
                                </div>
                                <label for="" class="col-sm-3 form-label">Alamat</label>
                                <div class="col-lg-9">
                                    : {{ $pesanan['alamat'] }}
                                </div>
                                <label for="" class="col-sm-3 form-label">Nomor Handphone</label>
                                <div class="col-lg-9">
                                    : {{ $pesanan['no_hp'] }}
                                </div>
                                <label for="" class="col-sm-3 form-label">Tanggal pesan</label>
                                <div class="col-lg-9">
                                    : {{ $pesanan['tgl_pesan'] }} s.d {{ $pesanan['tgl_akhir'] }}
                                </div>
                                <label for="" class="col-sm-3 form-label">catatan tambahan</label>
                                <div class="col-lg-9">
                                    : {{ $pesanan['catatan'] }}
                                </div>
                                <label for="" class="col-sm-3 form-label">Status</label>
                                <div class="col-lg-9 text-white">
                                    @if ($pesanan->status == 1)
                                        <td>
                                            <span class="badge bg-warning">{{ $pesanan->status_text }}</span>
                                        </td>
                                    @elseif ($pesanan->status == 2)
                                        <td>
                                            <span class="badge bg-primary">{{ $pesanan->status_text }}</span>
                                        </td>
                                    @elseif ($pesanan->status == 3)
                                        <td>
                                            <span class="badge bg-primary">{{ $pesanan->status_text }}</span>
                                        </td>
                                    @elseif ($pesanan->status == 4)
                                        <td>
                                            <span class="badge bg-info ">{{ $pesanan->status_text }}</span>
                                        </td>
                                    @elseif ($pesanan->status == 5)
                                        <td>
                                            <span class="badge bg-success ">{{ $pesanan->status_text }}</span>
                                        </td>
                                    @elseif ($pesanan->status == 6)
                                        <td>
                                            <span class="badge bg-danger">{{ $pesanan->status_text }}</span>
                                        </td>
                                    @endif
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    {{-- detail pesanan --}}
                    <div class="col-lg-5 col-md-12">
                        <div id="reservation-form" name="gs" class="p-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Detail Pesanan</em></h4>
                                </div>
                                <div class="col-lg-5">
                                    <img src="{{ asset($pesanan->armada->gambar) }}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-7">
                                    <h4 class="text-start mb-1">{{ $pesanan->armada->nama_armada }}</h4>
                                    <h6>{{ $pesanan->paket->nama_paket }}</h6>
                                    <h5 class="text-primary">Rp
                                        {{ number_format($pesanan->paket->harga + $pesanan->armada->harga, 0, 0, '.') }}
                                    </h5>
                                </div>
                                <div class="col-lg-4">
                                    <ul>
                                        @foreach ($pesanan->paket->detail_pakets as $detail)
                                            <li>{{ $detail->nama }}</li>
                                        @endforeach
                                    </ul>

                                    <button class="btn btn-danger cetak">cetak</button>
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
        $('.cetak').on('click', function() {
            Swal
                .fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda Akan Mendownlaod Report Berformat PDF, Mungkin Membutuhkan Waktu Beberapa Detik!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Download Sekarang!",
                    showLoaderOnConfirm: true,
                    preConfirm: function(login) {
                        return $.ajax({
                            url: "{{ route('cetak.pesanan', $pesanan->id) }}",
                            xhrFields: {
                                responseType: 'arraybuffer'
                            },
                            success: function(data, _, request) {
                                var blob = new Blob([data], {
                                    type: "application/pdf",
                                });

                                var link = document.createElement("a");
                                link.href = window.URL.createObjectURL(blob);
                                link.download = request.getResponseHeader('Content-Disposition')
                                    .split('filename="')[1]
                                    .split('"')[0];
                                link.click();

                                onSuccess();
                                window.respon = {
                                    status: true,
                                    message: "Berhasil Download!"
                                };
                            },
                            error: function(error) {
                                window.respon = JSON.parse(
                                    String.fromCharCode.apply(
                                        null,
                                        new Uint8Array(error)
                                    )
                                );
                            }
                        })
                    },
                })
                .then(function(result) {
                    if (result.isConfirmed) {
                        if (window.respon.status) {
                            Swal.fire("Berhasil!", "File Berhasil Di Download.", "success");
                        } else {
                            Swal.fire("Error!", window.respon.message, "error");
                        }
                    }
                });
        })
    </script>
@endsection
