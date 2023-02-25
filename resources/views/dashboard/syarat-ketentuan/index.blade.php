@extends('dashboard.layouts.main')

@section('content')
    <form method="POST" class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header d-flex w-100 py-3" style="background: #1d2c34;">
                <h3 class="m-0 font-weight-bold " style="color:  #db636f">Syarat dan Ketentuan</h3>
                <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
            </div>
            <div class="card-body">
                @csrf
                <textarea name="isi" id="isi" rows="10">{{ @$syarat->isi }}</textarea>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#isi'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
