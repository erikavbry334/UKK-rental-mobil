<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #1d2c34">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon"> 
                    <img src="{{ asset('assets/images/admin.png') }}" alt="" style="width: 50px;">
                </div>
                <div class="sidebar-brand-text" style="font-size: 24px">CAREV</div>

            </a>



            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item {{ Request::is('dashboard/paket') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard/paket">
                    <i class="fas fa-newspaper"></i>
                    <span>Paket</span></a>
            </li>

            <li class="nav-item {{ Request::is('dashboard/armada') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard/armada">
                    <i class="fas fa-taxi"></i>
                    <span>Armada</span></a>
            </li>
            <li class="nav-item {{ Request::is('dashboard/syarat-ketentuan') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard/syarat-ketentuan">
                    <i class="fas fa-handshake"></i>
                    <span>Syarat & ketentuan </span></a>
            </li>
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-layer-group"></i>
                    <span>Pesanan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/dashboard/pesanan">Semua</a>
                        <a class="collapse-item" href="/dashboard/pesanan/2">Sudah Dibayar</a>
                        <a class="collapse-item" href="/dashboard/pesanan/3">Sedang Disewa</a>
                        <a class="collapse-item" href="/dashboard/pesanan/4">Telah Dikembalikan</a>
                        <a class="collapse-item" href="/dashboard/pesanan/5">Selesai</a>
                        <a class="collapse-item" href="/dashboard/pesanan/6">Batal</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ Request::is('dashboard/denda') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard/denda">
                    <i class="fas fa-stopwatch"></i>
                    <span> denda </span></a>
            </li>
            <li class="nav-item {{ Request::is('dashboard/laporan') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard/laporan">
                    <i class="fas fa-info"></i>
                    <span> Laporan </span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ auth()->user()->name }}
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset(auth()->user()->avatar_url) }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/dashboard/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- Page Heading -->
                <div class="container-fluid">

                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->

                    <div class="container-fluid">
                        @yield('content')
                    </div>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2023</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">apakah anda yakin ingin Keluar dari halaman ini?</div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">batal</button>
                        <a class="btn btn-primary" href="/logout">Keluar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        @yield('script')
        @if ($message = Session::get('success'))
            <script>
                toastr.options = {
                    "positionClass": "toast-top-center mt-5",
                }
                toastr.success('{{ $message }}')
            </script>
        @elseif ($message = Session::get('info'))
            <script>
                toastr.options = {
                    "positionClass": "toast-top-center mt-5",
                }
                toastr.info('{{ $message }}')
            </script>
        @endif
</body>

</html>
