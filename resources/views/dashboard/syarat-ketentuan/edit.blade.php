@extends('dashboard.layouts.main')

@section('content')
    <div class="col-lg-18">
        <form action="/dashboard/syarat-ketentuan/{{ $syarat->id }}" method="POST" class="card shadow mb-4">
            @method('put')
            @csrf
            <div class="card-header d-flex w-100 py-3">
                <h3 class="m-0 font-weight-bold text-primary">Edit</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">nama paket</label>
                    <input value="{{ $syarat->keterangan }}" class="form-control" type="text" name="keterangan"
                        aria-label=".form-control-lg example">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary ml-auto">ubah</button>
                </div>
        </form>
    @endsection
