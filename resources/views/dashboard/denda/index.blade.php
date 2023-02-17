@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header d-flex w-100 py-3" style="background: #1d2c34;">
                <h3 class="m-0 font-weight-bold " style="color:  #db636f">Denda</h3>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length">
                                    <label>Show
                                        <select name="per" id="per" aria-controls="dataTable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10" {{ request()->per == '10' ? 'selected' : '' }}>10
                                            </option>
                                            <option value="25" {{ request()->per == '25' ? 'selected' : '' }}>25
                                            </option>
                                            <option value="50" {{ request()->per == '50' ? 'selected' : '' }}>50
                                            </option>
                                            <option value="100" {{ request()->per == '100' ? 'selected' : '' }}>100
                                            </option>
                                        </select> entries</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <form action="/dashboard/denda" method="GET" id="dataTable_filter"
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
                                            <th>No</th>
                                            <th>nama pemesan</th>
                                            <th>Telat berapa hari</th>
                                            <th>total denda</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dendas as $i => $denda)
                                            <tr>
                                                <td>{{ $dendas->firstItem() + $i }}</td>
                                                <td>{{ $denda->pesanan->nama_pemesan }}</td>
                                                <td>{{ $denda->telat_berapa_hari }}</td>
                                                <td>{{ $denda->total_denda }}</td>
                                                <td>
                                                    @if ($denda->pesanan->status == 5)
                                                        <span class="badge badge-success">Sudah Dibayar</span>
                                                    @else
                                                        <span class="badge badge-danger">Belum Dibayar</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="/dashboard/denda/{{ $denda->id }}/cetak" class="mr-2">
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fa fa-file-pdf"></i>
                                                            </button>
                                                        </form>
                                                        <a href="/dashboard/pesanan/{{ $denda->pesanan_id }}/detail" class="btn btn-info btn-sm" target="_blank">Pesanan</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $dendas->withQueryString()->links() }}

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.querySelector('#per').addEventListener('change', function() {
            window.location.href = "?per=" + this.value
        });
    </script>
@endsection
