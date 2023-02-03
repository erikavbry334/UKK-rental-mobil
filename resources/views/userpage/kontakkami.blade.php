@extends('userpage.layouts.main', ['title' => 'Kontak Kami'])

@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Hubungi Kami </h2>
                </div>
            </div>
        </div>
    </div>

   <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone text-brand"></i>
            <h4> Telepon </h4>
            <a href="#">+62 819 1305 4185</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope text-brand"></i>
            <h4> Email </h4>
            <a href="mailto:erikavebriyanti30304@gmail.com">erikavebriyanti30304@gmail.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker text-brand"></i>
            <h4> Lokasi </h4>
            <a href="#">Klakahrejo lor 4c Utara no33</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="map">
            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Klakahrejo IVC Utara Gang&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://temp-mailbox.com">temp mail</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
