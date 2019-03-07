@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DIINF++</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

    <link href="{{ asset('css/open-iconic-bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/aos.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/jquery.timepicker.css') }}" rel="stylesheet" type="text/css">


    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/icomoon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
  </head>
  <body>


    <!-- END nav -->

    <div class="hero-wrap js-fullheight" style="background-image: url('https://pctravel.ca/assets/userfiles/hero_flights3-1.gif');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{Auth::user()->name}}</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container" style ="margin-top:20px;">


      <h1 class="font-weight-bold text-center">Administrar</h1>
      <a type="button" class="btn btn-primary btn-lg btn-block" href="/autos/crear">Crear Auto</a>
      <a type="button" class="btn btn-primary btn-lg btn-block" href="/vuelos/crear">Crear Vuelo</a>
      <a type="button" class="btn btn-primary btn-lg btn-block" href="/hoteles/crear">Crear Hotel</a>
      

    <hr>

    <button type="button" onclick="volver()" class="btn btn-warning">Volver</button>
      <script>
        function volver() {
          window.history.back();
        }
      </script>

    <hr>


    <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Adventure</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About Us</a></li>
                <li><a href="#" class="py-2 d-block">Online enquiry</a></li>
                <li><a href="#" class="py-2 d-block">Call Us</a></li>
                <li><a href="#" class="py-2 d-block">General enquiries</a></li>
                <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                <li><a href="#" class="py-2 d-block">Refund policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Experience</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Beach</a></li>
                <li><a href="#" class="py-2 d-block">Adventure</a></li>
                <li><a href="#" class="py-2 d-block">Wildlife</a></li>
                <li><a href="#" class="py-2 d-block">Honeymoon</a></li>
                <li><a href="#" class="py-2 d-block">Nature</a></li>
                <li><a href="#" class="py-2 d-block">Party</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/aos.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script type="text/javascript" src="{{ asset('js/google-map.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

  </body>
</html>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    administrador registrado!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
