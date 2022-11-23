@extends('dashboard.layouts.main')

@section('content')
    <div class="col-lg-18">
        <form action="{{ '/dashboard/paket/' . $paket_id . '/dtpaket' }}" method="POST" class="card shadow mb-4">
            @csrf
            <div class="card-header d-flex w-100 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Detail Paket</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">nama detail paket</label>
                    <input class="form-control" type="text" name="nama">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-auto">submit</button>
            </div>
        </form>
@endsection