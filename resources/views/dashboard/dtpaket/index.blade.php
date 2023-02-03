@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header d-flex w-100 py-3">
                <h3 class="m-0 font-weight-bold" style="color:  #f8f9fc">Detail {{ $paket->nama_paket }}</h3>
                <a href="/dashboard/paket/{{ $paket_id }}/dtpaket/create" class="btn btn-primary ml-auto"> + Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length"><label>Show <select
                                            name="dataTable_length" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <form action="/dashboard/dtpaket" method="GET" id="dataTable_filter"
                                    class="dataTables_filter d-flex justify-content-end">
                                    <label>
                                        Search:
                                        <input type="search" name="search" value="{{ $request->search }}"
                                            class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                    style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 80px">No</th>
                                            <th>Detail Paket</th>
                                            <th>Paket</th>
                                            <th style="width: 150px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail_pakets as $i => $detail)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $detail->nama }}</td>
                                                <td>{{ $detail->paket->nama_paket }}</td>
                                                <td class="d-flex" style="width: 150px; gap: 1rem">
                                                    <a href="/dashboard/paket/{{ $paket_id }}/dtpaket/{{ $detail->id }}/edit"
                                                        class="btn btn-success">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                    <form
                                                        action="/dashboard/paket/{{ $paket_id }}/dtpaket/{{ $detail->id }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
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
@endsection
