@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DIINF++</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Paquetes</h1>
          </div>
        </div>
      </div>
    </div>
    
    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 sidebar order-md-last ftco-animate">
            <div class="sidebar-wrap ftco-animate">
              <h3 class="heading mb-4">Buscar Vuelo</h3>
              <form action="/vuelos/busqueda" method="post">
                <div class="fields">
                  <div class="form-group">
                    <input type="text" name="lugar_origen" class="form-control" placeholder="Origen">
                  </div>
                  <div class="form-group">
                    <div class="select-wrap one-third">
                      
                     <input type="text" name="lugar_destino" class="form-control" placeholder="Destino">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" name="fecha" id="checkin_date" class="form-control checkin_date" placeholder="Fecha">
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                  </div>
                </div>
              </form>
            </div>
          
          </div><!-- END-->
          
          <div class="col-lg-9">

            <div class="row">
                @foreach($paqueteAuto as $p)

              <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="destination">
                  <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('https://previews.123rf.com/images/milo827/milo8271311/milo827131100050/24025817-plane-delivering-large-package-through-the-sky.jpg');">
                  </a>
                  <div class="text p-3">
                    <div class="d-flex">
                      <div class="one">
                        <h3>Paquete n°: {{$p->id}}</h3>
                      
                     
                      </div>
                      <div class="two">
                        <span class="price">${{$p->precio}}</span>
                      </div>
                    </div>
                    
                    <p class="vuelo"><span>
                    @if(optional($p->flight()->first())->origin_id != '')
                      Vuelo desde {{optional($p->flight()->first())->origin->ciudad}} 
                      a {{optional($p->flight()->first())->destiny->ciudad}} 
                    @endif 
                    <br>
                    Incluye auto: {{$p->car->marca}} {{$p->car->modelo}}                 
                    </span></p>


                    <p class="auto"><span>
                     
                    </span></p>


                    <p class="habitacion"><span>
                     
                      </span></p>
                    <hr>
                    <p class="bottom-area d-flex">
                      
                      <form method="post" action="/paquetes/asientos">
                        <input type="hidden"  value="{{$p}}" name="paquete">
                        <input type="hidden"  value="{{$p->id}}" name="id_paquete">
                        <button type="submit" class="btn btn-danger">Reservar</button>
                      </form>
                    </p>
                    <form method="post" action="/paqueteauto/verdetalle">
                    <p class="bottom-area d-flex">                      
                      <input type="hidden"  value="{{$p}}" name="paquete">
                      <input type="hidden"  value="{{$p->id}}" name="id_paquete">
                      <button type="submit" class="btn btn-info">Ver detalles</button>
                    </p>
                    </form> 
                  </div>
                </div>
              </div>
          @endforeach
          @foreach($paqueteHotel as $p)

              <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="destination">
                  <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('https://previews.123rf.com/images/milo827/milo8271311/milo827131100050/24025817-plane-delivering-large-package-through-the-sky.jpg');">
                  </a>
                  <div class="text p-3">
                    <div class="d-flex">
                      <div class="one">
                        <h3>Paquete n°: {{$p->id}}</h3>
                      
                     
                      </div>
                      <div class="two">
                        <span class="price">${{$p->precio}}</span>
                      </div>
                    </div>
                    
                     <p class="vuelo"><span>
                    @if(optional($p->flight()->first())->origin_id != '')
                      Vuelo desde {{optional($p->flight()->first())->origin->ciudad}} 
                      a {{optional($p->flight()->first())->destiny->ciudad}} 
                    @endif 
                    <br>
                    Incluye auto: {{$p->car->marca}} {{$p->car->modelo}}                 
                    </span></p>
                     <p class="habitacion"><span>
                      @if(optional($p->room()->first())->capacidad != '')
                        Habitación para {{optional($p->room()->first())->capacidad}} 
                        personas en el hotel {{optional($p->room()->first())->hotel->nombre}}
                      @endif
                      </span></p>
                    <hr>
                    <p class="bottom-area d-flex">
                      
                      <form method="post" action="/paquetes/asientos">
                        <input type="hidden"  value="{{$p}}" name="paquete">
                        <input type="hidden"  value="{{$p->id}}" name="id_paquete">
                        <button type="submit" class="btn btn-danger">Reservar</button>
                      </form>
                    </p>
                    <form method="post" action="/paquetehotel/verdetalle">
                    <p class="bottom-area d-flex">                      
                      <input type="hidden"  value="{{$p}}" name="paquete">
                      <input type="hidden"  value="{{$p->id}}" name="id_paquete">
                      <button type="submit" class="btn btn-info">Ver detalles</button>
                    </p>
                    </form> 
                  </div>
                </div>
              </div>
          @endforeach
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

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


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>