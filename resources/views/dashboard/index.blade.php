@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        {{-- banyak armada --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="/dashboard/armada" class="card border-left-primary shadow h-100 py-2"
                style="border-left-color: rgb(47, 158, 233) !important;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                Armada </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_armada }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car-side fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- banyak pesanan --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="/dashboard/pesanan" class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Pesanan </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_pesanan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- banyak paket --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a hrerf="/dashboard/paket" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                Paket </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_paket }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- banyak denda --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="/dashboard/denda" class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                Denda </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_denda }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-stopwatch fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="dataTables_length">
        <label>Show
            <select name="per" id="per" aria-controls="dataTable"
                class="custom-select custom-select-sm form-control form-control-sm">
                <option value="10" {{ request()->per == '10' ? 'selected' : '' }}>10</option>
                <option value="25" {{ request()->per == '25' ? 'selected' : '' }}>25</option>
                <option value="50" {{ request()->per == '50' ? 'selected' : '' }}>50</option>
                <option value="100" {{ request()->per == '100' ? 'selected' : '' }}>100</option>
            </select> entries</label>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="m-0 font-weight-bold text-primary"> pesanan </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>nama pemesan</th>
                                    <th>tanggal</th>
                                    <th>armada</th>
                                    <th style="white-space: nowrap">total harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanans as $i => $pesanan)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $pesanan->nama_pemesan }}</td>
                                        <td style="white-space: nowrap">{{ $pesanan->tgl_pesan }} s.d
                                            {{ $pesanan->tgl_akhir }}</td>
                                        <td>{{ $pesanan->armada->nama_armada }}</td>
                                        <td>{{ $pesanan->total_harga }}</td>
                                        @if ($pesanan->status == 1)
                                            <td>
                                                <span class="badge badge-warning">{{ $pesanan->status_text }}</span>
                                            </td>
                                        @elseif ($pesanan->status == 2)
                                            <td>
                                                <span class="badge badge-primary">{{ $pesanan->status_text }}</span>
                                            </td>
                                        @elseif ($pesanan->status == 3)
                                            <td>
                                                <span class="badge badge-primary">{{ $pesanan->status_text }}</span>
                                                @if ($pesanan->is_denda)
                                                    <span class="badge badge-danger">Denda</span>
                                                @endif
                                            </td>
                                        @elseif ($pesanan->status == 4)
                                            <td>
                                                <span class="badge badge-primary">{{ $pesanan->status_text }}</span>
                                                @if ($pesanan->is_denda)
                                                    <span class="badge badge-danger">Denda</span>
                                                @endif
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="m-0 font-weight-bold text-primary"> User </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr role="row">
                                    <th>Avatar</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $i => $user)
                                    <tr>
                                        <td>
                                            <img src="{{ $user->avatar_url }}" width="60" class="rounded-full">
                                        </td>
                                        <td>
                                            <strong style="font-size: 1.25rem">{{ $user->name }}</strong>
                                            <div>{{ $user->email }}</div>
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
@endsection

@section('script')
    <script>
        document.querySelector('#per').addEventListener('change', function() {
            window.location.href = "?per=" + this.value
        });
    </script>
@endsection
