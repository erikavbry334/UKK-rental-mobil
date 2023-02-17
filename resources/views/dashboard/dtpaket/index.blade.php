@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header d-flex w-100 py-3" style="background: #1d2c34;">
                <h3 class="m-0 font-weight-bold" style="color:  #db636f">Detail {{ $paket->nama_paket }}</h3>
                <a href="/dashboard/paket/{{ $paket_id }}/dtpaket/create" class="btn btn-primary ml-auto"> + Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length">
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
                                                <td>{{ $detail_pakets->firstItem() + $i }}</td>
                                                <td>{{ $detail->nama }}</td>
                                                <td>{{ $detail->paket->nama_paket }}</td>
                                                <td class="d-flex" style="width: 150px; gap: 1rem">
                                                    <a href="/dashboard/paket/{{ $paket_id }}/dtpaket/{{ $detail->id }}/edit"
                                                        class="btn btn-success">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                    <button class="btn btn-danger hapus" type="submit" data-id="{{ $detail->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $detail_pakets->withQueryString()->links() }}

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
                        url: `/dashboard/paket/{{ $paket_id }}/dtpaket/${id}`,
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
