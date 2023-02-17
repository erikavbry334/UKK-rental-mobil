@extends('dashboard.layouts.main')

@section('content')
    <div class="col-lg-18">
        <form action="/dashboard/paket/{{ $paket->id }}" method="POST" enctype="multipart/form-data"
            class="card shadow mb-4">
            @method('put')
            @csrf
            <div class="card-header d-flex w-100 py-3">
                <h3 class="m-0 font-weight-bold text-primary">Edit Data Paket</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">nama paket</label>
                    <input value="{{ $paket->nama_paket }}" class="form-control" type="text" name="nama_paket"
                        aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">harga paket</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                        <input class="form-control" value="{{ number_format($paket->harga, 0, ',', '.') }}" type="text" name="harga" aria-label=".form-control-lg example" oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label d-block">gambar</label>
                    <img src="{{ asset($paket->gambar) }}" class="img-fluid" width="400" alt="">
                    <input class="form-control" type="file" id="gambar" name="gambar"
                        aria-label=".form-control-lg example">
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-auto">ubah</button>
            </div>
        </form>
    @endsection
