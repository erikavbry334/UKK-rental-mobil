@extends('dashboard.layouts.main')

@section('content')
    <div class="col-lg-18">
        <form action="/dashboard/paket" method="POST" class="card shadow mb-4">
            @csrf
            <div class="card-header d-flex w-100 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Data Kategori</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">nama paket</label>
                    <input class="form-control" type="text" name="nama_paket" aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">harga paket</label>
                    <input class="form-control" type="number" name="harga" aria-label=".form-control-lg example">
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-auto">submit</button>
            </div>
        </form>
@endsection
