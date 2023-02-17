@extends('userpage.layouts.main', ['title' => 'profile'])

@section('content')
    <div class="container" style="padding-top: 80px">
        <form action="/user" method="POST" enctype="multipart/form-data" class="card shadow mb-4">
            @csrf
            <div class="card-header d-flex justify-content-between w-100 py-3" style="background: #1d2c34">
                <h3 class="m-0 font-weight-bold text-brand">Profile Saya</h3>
                <a href="/logout" class="border border-danger btn ml-auto text-white">logout</a>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-brand" id="edit-tab" data-toggle="tab"
                            data-target="#edit-tab-pane" type="button" role="tab" aria-controls="edit-tab-pane"
                            aria-selected="true">Edit
                            Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-brand" id="profile-tab" data-toggle="tab"
                            data-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane"
                            aria-selected="false">Riwayat
                            Pesanan</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="edit-tab-pane" role="tabpanel" aria-labelledby="edit-tab"
                        tabindex="0" class="offset-lg-4 col-lg-4 col-sm-6 col-12 main-section text-center">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
                        </div>
                        <div class="row user-detail position-relative">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <label for="avatar" style="position: relative;">
                                    <img src="{{ auth()->user()->avatar_url }}" style="width: 200px!important; aspect-ratio: 1/1"
                                        class="rounded-circle img-thumbnail avatar-preview">
                                    <div style="position: absolute; cursor: pointer; top: 0; right: 0; border-radius: 50%; width: 32px; height: 32px; background: #1d2c34"
                                        class="align-items-center border btn btn-primary d-flex justify-content-center border-0">
                                        <i class="fa fa-pen"></i>
                                    </div>
                                    <input type="file" class="d-none" name="avatar" id="avatar"
                                        onchange="previewImage()">
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>armada</th>
                                                <th>paket</th>
                                                <th>total harga</th>
                                                <th>status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pesanans as $i => $pesanan)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $pesanan->nama_pemesan }}</td>
                                                    <td>{{ $pesanan->armada->nama_armada }}</td>
                                                    <td>{{ $pesanan->paket->nama_paket }}</td>
                                                    <td>{{ $pesanan->total_harga }}</td>
                                                    @if ($pesanan->status == 1)
                                                        <td>
                                                            <span
                                                                class="badge bg-warning">{{ $pesanan->status_text }}</span>
                                                            @if ($pesanan->is_denda)
                                                                <span class="badge bg-danger">Denda</span>
                                                            @endif
                                                        </td>
                                                    @elseif ($pesanan->status == 2 || $pesanan->status == 3 || $pesanan->status == 4)
                                                        <td>
                                                            <span
                                                                class="badge bg-primary">{{ $pesanan->status_text }}</span>
                                                            @if ($pesanan->is_denda)
                                                                <span class="badge bg-danger">Denda</span>
                                                            @endif
                                                        </td>
                                                    @elseif ($pesanan->status == 5)
                                                        <td>
                                                            <span
                                                                class="badge bg-success">{{ $pesanan->status_text }}</span>
                                                            @if ($pesanan->is_denda)
                                                                <span class="badge bg-danger">Denda</span>
                                                            @endif
                                                        </td>
                                                    @elseif ($pesanan->status == 6)
                                                        <td>
                                                            <span
                                                                class="badge bg-danger">{{ $pesanan->status_text }}</span>
                                                            @if ($pesanan->is_denda)
                                                                <span class="badge bg-danger">Denda</span>
                                                            @endif
                                                        </td>
                                                    @endif
                                                    <td>
                                                        @if ($pesanan->status == 1)
                                                            <a href="/pesanan/{{ $pesanan->id }}/batal"
                                                                class="btn btn-success ml-auto">batalkan</a>
                                                        @endif
                                                        <a href="/pesanan/{{ $pesanan->uuid }}"
                                                            class="btn btn-primary ml-auto">detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
