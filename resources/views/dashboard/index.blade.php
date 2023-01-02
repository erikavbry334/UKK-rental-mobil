@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        {{-- banyak armada --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" style="border-left-color: rgb(47, 158, 233) !important;">
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
            </div>
        </div>
        {{-- banyak user --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                User </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_user }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- banyak  --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                Pesanan </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_pesanan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 col-md-8">
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
                            <th>tanggal kembali</th>
                            <th>armada</th>
                            <th>paket</th>
                            <th>total harga</th>
                            <th>Status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
@endsection
