@extends('dashboard.layouts.main')

@section('content')
    <div class="col-lg-18">
        <form action="{{ '/dashboard/paket/' . $paket_id . '/dtpaket/' . $detail_paket_id }}" method="POST" enctype="multipart/form-data"
            class="card shadow mb-4">
            @method('put')
            @csrf
            <div class="card-header d-flex w-100 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data DetailPaket</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Detail Paket</label>
                    <input value="{{ $detail->nama }}" class="form-control" type="text" name="nama"
                        aria-label=".form-control-lg example">
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-auto">ubah</button>
            </div>
        </form>
    @endsection
