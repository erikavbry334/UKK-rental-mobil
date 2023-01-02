@extends('dashboard.layouts.main')

@section('content')
    <div class="col-lg-18">
        <form action="/dashboard/syarat-ketentuan" method="POST" enctype="multipart/form-data" class="card shadow mb-4">
            @csrf
            <div class="card-header d-flex w-100 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Syarat</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">isi Syarat</label>
                    <input class="form-control" type="text" name="syarat" aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">isi ketentuan</label>
                    <input class="form-control" type="text" name="ketentuan" aria-label=".form-control-lg example">
                </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-auto">tambah</button>
            </div>
        </form>
@endsection
