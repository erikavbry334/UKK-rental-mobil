@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header d-flex w-100 py-3" style="background: #1d2c34; ">
                <h3 class="m-0 font-weight-bold" style="color: #db636f">Data Armada</h3>
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
                                                <td>{{ $armadas->firstItem() + $i }}</td>
                                                <td>{{ $armada->nama_armada }}</td>
                                                <td>{{ $armada->no_plat }}</td>
                                                <td>Rp {{ number_format($armada->harga, 0, ',', '.') }}</td>
                                                <td style="width: 250px">
                                                    <img src="{{ asset($armada->gambar) }}" class="img-fluid"
                                                        width="200">
                                                </td>
                                                <td style="width: 100px">
                                                    @if ($armada->status == "Tersedia")
                                                        <span
                                                            class="badge badge-success">{{ $armada->status }}</span>
                                                    @elseif ($armada->status == "Servis")
                                                        <span
                                                            class="badge badge-warning">{{ $armada->status }}</span>
                                                    @elseif ($armada->status == "Rusak")
                                                        <span
                                                            class="badge badge-danger">{{ $armada->status }}</span>
                                                    @elseif ($armada->status == "Disewa")
                                                        <span
                                                            class="badge badge-primary">{{ $armada->status }}</span>
                                                    @endif
                                                </td>
                                                <td style="width: 100px">
                                                    <div class="d-flex " style="gap: 1rem">
                                                        <a href="/dashboard/armada/{{ $armada->id }}/edit"
                                                            class="btn btn-success ">
                                                            <i class="fa fa-pen"></i>
                                                        </a>

                                                        <button class="btn btn-danger hapus" type="submit"
                                                            data-id="{{ $armada->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
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
                {{ $armadas->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.querySelector('#per').addEventListener('change', function() {
            window.location.href = "?per=" + this.value
        });

        $('.hapus').on('click', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data Yang Dihapus Tidak Dapat Dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                preConfirm: (login) => {
                    return $.ajax({
                        url: `/dashboard/armada/${id}`,
                        method: 'POST',
                        data: {
                            _method: "DELETE",
                            _token: "{{ csrf_token() }}"
                        },
                        error: function() {
                            Swal.showValidationMessage('Data gagal dihapus!')
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Data berhasil dihapus!', '', 'success').then(() => window.location.reload());
                }
            })
        })
    </script>
@endsection
