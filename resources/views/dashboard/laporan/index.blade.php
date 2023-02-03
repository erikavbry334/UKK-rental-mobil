@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header d-flex w-100 py-3">
                <h3 class="m-0 font-weight-bold" style="color:  #f8f9fc">Laporan</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="row">
                    @csrf
                    <div class="col-lg-3">
                        <label for="bulan">Bulan</label>
                        <select class="custom-select" name="bulan" id="bulan">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="tahun">Tahun</label>
                        <div class="d-none">
                            {{ $end = date('Y') }}
                            {{ $start = 2020 }}
                        </div>
                        <select class="custom-select" name="tahun" id="tahun">
                            @for ($i = $end; $i >= $start; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <div class="mt-4">
                            <button class="btn btn-danger" type="submit">Cetak PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
