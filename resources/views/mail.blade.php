@extends('layouts.app')

@section('content')

<head>
  <title>DIINF++</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" type="text/css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/open-iconic-bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/animate.css')}}">
    
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/owl.theme.default.min.css')}}">
  <link rel="stylesheet"  type="text/css" href="{{URL::asset('css/magnific-popup.css')}}">

  <link rel="stylesheet" type="text/css"  href="{{URL::asset('css/aos.css')}}">

  <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/ionicons.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/jquery.timepicker.css')}}">

    
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/flaticon.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/icomoon.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
</head>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header bg-primary textx-white">Prueba Email</div>
					<div class="card-body">
						<form method="POST" action="{{url('/email_send')}}">
							<!--@csrf-->
							<div class="form-group row">
								<label for="subject" class="col-sm-4 col-form-label text-md-right">Asunto</label>
								
								<div class="col-md-6">
									<input id="subject" type="subject" class="form-control{{$errors->has('subject') ? 'is-invalid' : ''}}" name="subject" value="{{old('subject')}}" required autofocus>
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
								
								<div class="col-md-6">
									<input id="email" type="email" class="form-control{{$errors->has('email') ? 'is-invalid' : ''}}" name="email" value="{{old('email')}}" required autofocus>
								</div>
							</div>

							<div class="form-group row">
								<label for="message" class="col-sm-4 col-form-label text-md-right">Mensaje</label>
								
								<div class="col-md-6">
									<textarea class="form-control{{$errors->has('message') ? 'is-invalid' : ''}}" name="message" id="" cols="30" rows="5"></textarea>
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
									<button type="submit" class="btn btn-primary">Enviar Email</button>
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection

  <script src="{{URL::asset('js/jquery.min.js')}}"></script>
  <script src="{{URL::asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{URL::asset('js/popper.min.js')}}"></script>
  <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{URL::asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{URL::asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{URL::asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{URL::asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{URL::asset('js/aos.js')}}"></script>
  <script src="{{URL::asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{URL::asset('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{URL::asset('js/jquery.timepicker.min.js')}}"></script>
  <script src="{{URL::asset('js/scrollax.min.js')}}"></script>
  <script src="{{URL::asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script>
  <script src="{{URL::asset('js/google-map.js')}}"></script>
  <script src="{{URL::asset('js/main.js')}}"></script>