@extends('layouts.app')
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
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">DIINF++</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
           <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/flights" class="nav-link">Vuelos</a></li>
            <li class="nav-item"><a href="/destinies" class="nav-link">Alojamiento</a></li>
            <li class="nav-item"><a href="/cars" class="nav-link">Autos</a></li>
            <li class="nav-item"><a href="/packages" class="nav-link">Paquetes</a></li>
            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('https://pctravel.ca/assets/userfiles/hero_flights3-1.gif');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container" style ="margin-top:20px;">


    <h1 class="font-weight-bold text-center">Lista de ítems</h1>
    <h2 class="text-center">N° Reserva: {{$reservation->id}}</h2>
    <table class="table">
          <tr>
            <th class="cell">Ítem</th>
            <th class="cell">Descripción</th>
            <th class="cell">Precio</th>
          </tr>
 
          @foreach($seats as $s)
          <tr>
            <th class="font-weight-normal cell">Asiento</th>
            <th class="font-weight-normal cell">{{$s->tipo}} en el vuelo desde {{$s->flight->origin->ciudad}} a {{$s->flight->destiny->ciudad}}</th>
            <th class="font-weight-normal cell">${{$s->precio}}</th>   
          </tr>
          @endforeach

          @foreach($cars as $c)
          <tr>
            <th class="font-weight-normal cell">Auto</th>
            <th class="font-weight-normal cell">Marca: {{$c->marca}} / Modelo: {{$c->modelo}}</th>
            <th class="font-weight-normal cell">${{$c->precio}}/día x {{$c->dias}} días</th>
          </tr>
          @endforeach

          @foreach($rooms as $r)
          <tr>
            <th class="font-weight-normal cell">Habitación</th>
            <th class="font-weight-normal cell">En el hotel {{$r->hotel->nombre}} con capacidad para {{$r->capacidad}} persona(s)</th>
            <th class="font-weight-normal cell">${{$r->precio}}/noche x {{$r->dias}} noches</th>
          </tr>
          @endforeach

          @foreach($secures as $sec)
          <tr>
            <th class="font-weight-normal cell">Seguro</th>
            <th class="font-weight-normal cell">Tipo: {{$sec->tipo}}</th>
            <th class="font-weight-normal cell">${{$sec->precio}}</th>
          </tr>
          @endforeach

          <tr>
            <th class="cell">Total</th>
            <th class="cell"></th>
            <th class="cell">${{$reservation->precio}}</th>
          </tr>
    </table> 

    <hr>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 text-center order-md-last ftco-animate">
            <div class="sidebar-wrap ftco-animate">
              <h3 class="heading mb-4">Formulario de confirmación de compra</h3>
              <form action="" method="post">
                <div class="fields">

                    <div class="form-group">
                      <div class="select-wrap one-third">
                        <select class="form-control" id="sel1">
                        <option hidden>Tipo tajeta</option>
                        <option value="Visa">Visa</option>
                        <option value="Master Card">Master Card</option>
                        <option value="American Express">American Express</option>
                        <option value="Discover Card">Discover Card</option>
                        </select>
                      </div>                    
                    </div>

                  <div class="form-group">
                    <div class="select-wrap one-third">

                     <input type="text" minlength=13 maxlength=19 name="n_tarjeta" class="form-control" placeholder="N° Tarjeta">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="select-wrap one-third">
                     <input type="text" name="f_vence" minlength=7 maxlength=7 class="form-control" placeholder="Fecha de vencimiento (MM/YYYY)">
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="password" name="cvv" minlength=3 maxlength=3 class="form-control" placeholder="CVV">
                  </div>

                  <div class="form-group">
                    <input type="text" name="nombre_t" minlength=2 class="form-control" placeholder="Nombre del titular">
                  </div>

                  <div class="form-group">
                    <input type="text" name="apellido_t" minlength=3 class="form-control" placeholder="Apellido del titular">
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Crear" class="btn btn-primary py-3 px-5">
                  </div>
                </div>
              </form>
            </div>

          </div><!-- END-->

      </div>
    </section> <!-- .section -->

    <hr>

    <div>
      @if($reservation->precio != 0)
        <form method="post" action="">
          <p class="bottom-area d-flex">
            <input type="hidden"  value="" name="">
            <input type="hidden"  value="" name="">
            <button type="submit" class="btn btn-success">Confirmar reserva</button>
          </p>
        </form>
      @endif
    </div>


<!--
    @foreach($secures as $sec)
      <h1>ID {{$sec->id}}</h1>
      <h1>TI {{$sec->tipo}}</h1>
      <h1>PR {{$sec->precio}}</h1>
      <h1>PI {{$sec->passenger_id}}</h1>
      <h1>RI {{$sec->reservation_id}}</h1>
    @endforeach

-->
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