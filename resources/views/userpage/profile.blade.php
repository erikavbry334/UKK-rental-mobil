@extends('userpage.layouts.main', ['title' => 'Profile saya'])

@section('content')
    <div class="container" style="padding-top: 80px">
        <form action="/user" method="POST" enctype="multipart/form-data" class="card shadow mb-4">
            @csrf
            <div class="card-header d-flex justify-content-between w-100 py-3">
                <h3 class="m-0 font-weight-bold text-primary">Profile Saya</h3>
                <a href="/logout" class="btn btn-danger ml-auto">logout</a>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="edit-tab" data-toggle="tab" data-target="#edit-tab-pane"
                            type="button" role="tab" aria-controls="edit-tab-pane" aria-selected="true">Edit
                            Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile-tab-pane"
                            type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Riwayat
                            Pesanan</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="edit-tab-pane" role="tabpanel" aria-labelledby="edit-tab"
                        tabindex="0" class="offset-lg-4 col-lg-4 col-sm-6 col-12 main-section text-center">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
                        </div>
                        <div class="row user-detail">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <label for="avatar" style="position: relative;">
                                    <img src="{{ auth()->user()->avatar_url }}" style="width: 200px!important"
                                        class="rounded-circle img-thumbnail avatar-preview">
                                    <div style="position: absolute; cursor: pointer; top: 0; right: 0; border-radius: 50%; width: 32px; height: 32px" class="bg-white border d-flex justify-content-center align-items-center">
                                        <i class="fa fa-pen"></i>
                                    </div>
                                    <input type="file" class="d-none" name="avatar" id="avatar" onchange="previewImage()">
                                </label>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label d-block">Nama </label>
                                    <input value="{{ auth()->user()->name }}" class="form-control" type="text"
                                        name="name" aria-label=".form-control-lg example">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Email</label>
                                    <input value="{{ auth()->user()->email }}" class="form-control" type="text"
                                        name="email" aria-label=".form-control-lg example">
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-success ml-auto">ubah</button>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <h1>Riwayat Pesanan</h1>
                    </div>
                </div>
            </div>
        </form>
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