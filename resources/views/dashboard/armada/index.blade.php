@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header d-flex w-100 py-3">
                <h3 class="m-0 font-weight-bold" style="color:  #22b3c1">Data Armada</h3>
                <a href="/dashboard/armada/create" class="btn btn-primary ml-auto"> + Tambah </a>
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
                                <form action="/dashboard/armada" method="GET" id="dataTable_filter"
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
                                            <th>Name</th>
                                            <th>no plat</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($armadas as $i => $armada)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $armada->nama_armada }}</td>
                                                <td>{{ $armada->no_plat }}</td>
                                                <td>{{ $armada->harga }}</td>
                                                <td style="width: 250px">
                                                    <img src="{{ asset($armada->gambar) }}" class="img-fluid"
                                                    width="200">
                                                </td>
                                                 
                                                <td style="width: 100px">
                                                    <span class="badge badge-primary">{{ $armada->status }}</span>
                                                </td>
                                                <td style="width: 100px">
                                                    <div class="d-flex " style="gap: 1rem">
                                                        <a href="/dashboard/armada/{{ $armada->id }}/edit"
                                                            class="btn btn-success ">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                        
                                                        <form action="/dashboard/armada/{{ $armada->id }}"
                                                            method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-danger" type="submit">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
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
                {{ $armadas->links() }}
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
