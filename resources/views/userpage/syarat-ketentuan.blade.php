@extends('userpage.layouts.main', ['title' => 'syaratketentuan'])

<!-- ***** Header Area End ***** -->
@section('content')
    {{-- gambar  --}}
    <div class="more-about">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-image">
                        <img src="assets/images/syarat.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
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
