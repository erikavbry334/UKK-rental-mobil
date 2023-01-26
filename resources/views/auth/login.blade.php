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
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
</head>

<body style="background: #22b3c1">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-12 col-md-9 d-flex align-items-center" style="height: 100vh">

                <div class="card o-hidden border-0 shadow my-5 w-100" style="height: 70vh">
                    <div class="card-body p-0 h-100">
                        <!-- Nested Row within Card Body -->
                        <div class="row h-100">
                            <div class="col-lg-7 d-none d-lg-block ">
                                <img src="{{ asset('assets/images/login.jpg') }}"
                                    style="width: 100%; height: 100%; object-fit: cover">
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
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder=" Email Address..." style="font-size: 1.5rem">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password" style="font-size: 1.5rem">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button class="btn btn-user btn-block text-white"
                                            style="background: #22b3c1; font-size: 1.5rem">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="medium" href="/register" style="font-size: 1.5rem "w>Daftar</a>
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

</html>
