@extends('dashboard.layouts.main')

@section('content')
    <div class="col-lg-18">
        <form action="/dashboard/armada/{{ $armada->id }}" method="POST" enctype="multipart/form-data"
            class="card shadow mb-4">
            @method('put')
            @csrf
            <div class="card-header d-flex w-100 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Armada</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Nama Armada</label>
                    <input value="{{ $armada->nama_armada }}" class="form-control" type="text" name="nama_armada"
                        aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">no_plat</label>
                    <input value="{{ $armada->no_plat }}" class="form-control" type="text" name="no_plat"
                        aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">harga</label>
                    <input value="{{ $armada->harga }}" class="form-control" type="number" name="harga"
                        aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label d-block">gambar</label>
                    <img src="{{ asset($armada->gambar) }}" class="img-fluid" width="400" alt="">
                    <input class="form-control" type="file" id="gambar" name="gambar"
                        aria-label=".form-control-lg example">
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-auto">ubah</button>
            </div>
        </form>
    @endsection
