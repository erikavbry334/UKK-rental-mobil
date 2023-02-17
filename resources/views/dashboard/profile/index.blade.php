@extends('dashboard.layouts.main')

@section('content')
    <form action="/dashboard/profile" method="POST" enctype="multipart/form-data" class="row user-detail position-relative">
        @csrf
        <div class="col-lg-12 col-sm-12 col-12">
            <label for="avatar" style="position: relative;">
                <img src="{{ auth()->user()->avatar_url }}" style="width: 200px!important; aspect-ratio: 1/1"
                    class="rounded-circle img-thumbnail avatar-preview">
                <div style="position: absolute; cursor: pointer; top: 0; right: 0; border-radius: 50%; width: 32px; height: 32px; background: #1d2c34"
                    class="align-items-center border btn btn-primary d-flex justify-content-center border-0">
                    <i class="fa fa-pen"></i>
                </div>
                <input type="file" class="d-none" name="avatar" id="avatar" onchange="previewImage()">
            </label>
            <div class="mb-3">
                <label for="formFile" class="form-label d-block">Nama </label>
                <input value="{{ auth()->user()->name }}" class="form-control" type="text" name="name"
                    aria-label=".form-control-lg example">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Email</label>
                <input value="{{ auth()->user()->email }}" class="form-control" type="text" name="email"
                    aria-label=".form-control-lg example">
            </div>
            <hr>
            <button type="submit" class="btn btn-success ml-auto">ubah</button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function previewImage() {
            const avatar = document.querySelector('#avatar');
            const avatarPreview = document.querySelector('.avatar-preview');

            const reader = new FileReader();
            reader.readAsDataURL(avatar.files[0]);

            reader.onload = function(ev) {
                avatarPreview.src = ev.target.result;
            }
        }
    </script>
@endsection