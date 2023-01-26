@extends('userpage.layouts.main', ['title' => 'syaratketentuan'])

<!-- ***** Header Area End ***** -->
@section('content')
    {{-- gambar  --}}
    <div class="more-about mt-0">
        <div class="d-flex justify-content-center align-items-center" style="height: 250px; background: #f0f0f0">
            <h1>Tentang Kami</h1>
        </div>
        <div class="container mt-4" style="max-width: 768px">
            <div class="text-center" style="position: relative; top: -100px">
                <img src="assets/images/syarat.jpg" class="img-fluid">
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h1>Syarat dan Ketentuan</h1>
                    </div>
                    <div class="row">
                        <h5><u>SYARAT</u></h5>
                        <div class="col-lg-12 mt-2">
                            @foreach ($syarats as $syarat)
                                <li style="list-style: disc; margin-left: 1rem">{{ $syarat->syarat }}</li>
                            @endforeach
                        </div>
                        <h5 class="mt-5"><u>KETENTUAN</u></h5>
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                @foreach ($syarats as $syarat)
                                    <li style="list-style: disc; margin-left: 1rem">{{ $syarat->ketentuan }}</li>
                                @endforeach
                            </div>
                        </div>
                        <div class="main-button">
                            <a href="/"> Pesan sekarang </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            $(".option").click(function() {
                $(".option").removeClass("active");
                $(this).addClass("active");
            });
        </script>
    @endsection
