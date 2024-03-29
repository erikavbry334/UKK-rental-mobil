<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login - CAREV</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
</head>

<body style="background: #1d2c34">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 d-flex align-items-center" style="height: 100vh">

                <div class="card o-hidden border-0 shadow my-5 w-100">
                    <div class="card-body p-0 h-100">
                        <!-- Nested Row within Card Body -->
                        <div class="row h-100">
                            <div class="col-lg-7 d-none d-lg-block "
                                style="background-image: url({{ asset('assets/images/login.jpg') }}); background-size: cover; background-position: center">
                            </div>
                            <div class="col-lg-5 d-flex align-items-center">
                                <div class="p-5 w-100">
                                    <div class="text-center">
                                        <h1 class="text-dark mb-4">Login</h1>
                                    </div>
                                    <form method="POST" action="/login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" autocomplete="off"
                                                placeholder=" Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" autocomplete="off"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button class="btn btn-user btn-block text-white" style="background: #db636f">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <span>belum punya akun?</span>
                                        <a class="medium" href="/register">Daftar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if ($message = Session::get('success'))
    <script>
        toastr.options = {
            "positionClass": "toast-top-center",
        }
        toastr.success('{{ $message }}')
    </script>
@endif


</html>
