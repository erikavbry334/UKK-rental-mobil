@extends('dashboard.layouts.main')

@section('content')
    <div class="col-lg-12">
        <form action="/dashboard/armada" method="POST" enctype="multipart/form-data" class="card shadow mb-4">
            @csrf
            <div class="card-header d-flex w-100 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Data Armada</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Nama Armada</label>
                    <input class="form-control" type="text" name="nama_armada" aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">no_plat</label>
                    <input class="form-control" type="text" name="no_plat" aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">harga</label>
                    <input class="form-control" type="number" name="harga" aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">jumlah unit</label>
                    <input class="form-control" type="number" name="jumlah_unit" aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar" aria-label=".form-control-lg example">
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-auto">submit</button>
            </div>
        </form>
@endsection
