@extends('dashboard.layouts.main')

@section('content')
    <div class="col-lg-12">
        <form action="/dashboard/armada" method="POST" enctype="multipart/form-data" class="card shadow mb-4">
            @csrf
            <div class="card-header d-flex w-100 py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Data Armada</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Nama Armada</label>
                    <input class="form-control" type="text" name="nama_armada" aria-label=".form-control-lg example" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">no_plat</label>
                    <input class="form-control" type="text" name="no_plat" aria-label=".form-control-lg example" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                        <input class="form-control" type="text" name="harga" aria-label=".form-control-lg example" oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')" autocomplete="off">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">gambar</label>
                    <input class="form-control" type="file" id="gambar" name="gambar"
                        aria-label=".form-control-lg example" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">status</label>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-Tersedia"
                                    value="Tersedia">
                                <label class="form-check-label" for="status-Tersedia">
                                    Tersedia
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-Servis"
                                    value="Servis">
                                <label class="form-check-label" for="status-Servis">
                                    Servis
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status-Rusak"
                                    value="Rusak">
                                <label class="form-check-label" for="status-Rusak">
                                    Rusak
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary ml-auto">submit</button>
            </div>
        </form>
    @endsection
