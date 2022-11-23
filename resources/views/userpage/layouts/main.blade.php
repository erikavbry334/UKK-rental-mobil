<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>{{$title}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-woox-travel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>

<body style="padding-bottom: 110px; position: relative; min-height: 100vh">
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
      @include('userpage.partials.navbar')
  <!-- ***** Header Area End ***** -->
  
    @yield('content')

  @include('userpage.partials.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset ('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset ('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{asset ('assets/js/isotope.min.js')}}"></script>
  <script src="{{asset ('assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset ('assets/js/wow.js')}}"></script>
  <script src="{{asset ('assets/js/tabs.js')}}"></script>
  <script src="{{asset ('assets/js/popup.js')}}"></script>
  <script src="{{asset ('assets/js/custom.js')}}"></script>

   <!-- Scripts -->
   @yield('script')
  </body>
</html>
