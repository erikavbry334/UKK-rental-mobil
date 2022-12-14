@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header d-flex w-100 py-3">
                <h3 class="m-0 font-weight-bold" style="color: #22b3c1">
                    Data Pesanan:
                    @if ($status == 1)
                        Menunggu Pembayaran
                    @elseif ($status == 2)
                        Sudah Dibayar
                    @elseif ($status == 3)
                        Sedang Disewa
                    @elseif ($status == 4)
                        Telah Dikembalikan
                    @elseif ($status == 5)
                        Selesai
                    @elseif ($status == 6)
                        Batal
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length"><label>Show <select
                                            name="dataTable_length" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <form action="/dashboard/pesanan" method="GET" id="dataTable_filter"
                                    class="dataTables_filter d-flex justify-content-end">
                                    <label>
                                        Search:
                                        <input type="search" name="search" value="{{ $request->search }}"
                                            class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                    style="width: 100%; ">
                                    <thead>
                                        <tr role="row">
                                            <th>No</th>
                                            <th>nama pemesan</th>
                                            <th>tanggal</th>
                                            <th>tanggal kembali</th>
                                            <th>armada</th>
                                            <th>paket</th>
                                            <th>total harga</th>
                                            <th>Status</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesanans as $i => $pesanan)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $pesanan->nama_pemesan }}</td>
                                                <td>{{ $pesanan->tgl_pesan }} s.d {{ $pesanan->tgl_akhir }}</td>
                                                <td>{{ $pesanan->tgl_kembali }}</td>
                                                <td>{{ $pesanan->armada->nama_armada }}</td>
                                                <td>{{ $pesanan->paket->nama_paket }}</td>
                                                <td>{{ $pesanan->total_harga }}</td>
                                                @if ($pesanan->status == 1)
                                                    <td>
                                                        <span class="badge badge-warning">{{ $pesanan->status_text }}</span>
                                                    </td>
                                                @elseif ($pesanan->status == 2)
                                                    <td>
                                                        <span
                                                            class="badge badge-primary">{{ $pesanan->status_text }}</span>
                                                    </td>
                                                @elseif ($pesanan->status == 3)
                                                    <td>
                                                        <span
                                                            class="badge badge-primary">{{ $pesanan->status_text }}</span>
                                                    </td>
                                                @elseif ($pesanan->status == 4)
                                                    <td>
                                                        <span
                                                            class="badge badge-primary">{{ $pesanan->status_text }}</span>
                                                    </td>
                                                @elseif ($pesanan->status == 5)
                                                    <td>
                                                        <span class="badge badge-success">{{ $pesanan->status_text }}</span>
                                                    </td>
                                                @elseif ($pesanan->status == 6)
                                                    <td>
                                                        <span class="badge bg-danger">{{ $pesanan->status_text }}</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="/dashboard/pesanan/{{ $pesanan->id }}/detail"
                                                        class="btn btn-info">Detail</a>
                                                    @if ($pesanan->status != 5 && $pesanan->status != 6)
                                                        <form action="/dashboard/pesanan/{{ $pesanan->id }}/update-status"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary"
                                                                style="white-space: nowrap">
                                                                @if ($pesanan->status == 2)
                                                                    <input type="hidden" name="status" value="3">
                                                                    Sedang Disewa <i class="fas fa-chevron-right"></i>
                                                                @elseif ($pesanan->status == 3)
                                                                    <input type="hidden" name="status" value="4">
                                                                    Telah Dikembalikan <i class="fas fa-chevron-right"></i>
                                                                @elseif ($pesanan->status == 4)
                                                                    <input type="hidden" name="status" value="5">
                                                                    Selesai <i class="fas fa-chevron-right"></i>
                                                                @endif
                                                            </button>
                                                        </form>
                                                        <form action="/dashboard/pesanan/{{ $pesanan->id }}/update-status"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">
                                                                <input type="hidden" name="status" value="3">
                                                                Batal <i class="fas fa-chevron-right"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
