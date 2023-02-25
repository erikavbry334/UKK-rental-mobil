@extends('userpage.layouts.main', ['title' => 'syaratketentuan'])

<!-- ***** Header Area End ***** -->
@section('style')
    <style>
        h1, h2, h3, h4, h5, h6 {
            margin-bottom: 1rem;
        }
        
        ul, li {
            list-style-type: disc !important;
            margin-left: 1.5rem
        }
    </style>
@endsection
@section('content')
    {{-- gambar  --}}
    <div class="more-about mt-0">
        <div class="d-flex justify-content-center align-items-center"
            style="height: 480px; background-image: url({{ asset('assets/images/syarat-ketentuan.jpg') }}); background-size: cover">
            <h1 class="text-white">Syarat dan Ketentuan </h1>
        </div>
        <div class="container mt-4" style="max-width: 996px">
            {{-- <div class="text-center" style="position: relative; top: -100px">
                <img src="assets/images/syarat.jpg" class="img-fluid">
            </div> --}}
            <div class="card" style="transform: translateY(-120px)">
                <div class="card-body">
                    <article>{!! $syarat->isi !!}</article>
                    <div class="main-button mt-5">
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
