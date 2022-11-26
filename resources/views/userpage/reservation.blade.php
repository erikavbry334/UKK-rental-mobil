@extends('userpage.layouts.main', ['title' => 'Reservation'])

<!-- ***** Header Area End ***** -->
@section('content')
    <div class="second-page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <h3>{{$syarat->keterangan}}</h3>
                    <h2>Make Your Reservation</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt uttersi
                        labore et dolore magna aliqua is ipsum suspendisse ultrices gravida</p>
                    <div class="main-button"><a href="about.html">Discover More</a></div>
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
