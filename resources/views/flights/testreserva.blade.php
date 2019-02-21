
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">DIINF++</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul
     class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/flights">Vuelos</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link disabled" href="/packages" tabindex="-1" aria-disabled="true">Paquetes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="/cars" tabindex="-1" aria-disabled="true">Autos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="/login" tabindex="-1" aria-disabled="true">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="/register" tabindex="-1" aria-disabled="true">Register</a>
      </li>
    </ul>
  
  </div>
</nav>
<div class="container">
@foreach($flights as $f)
<div class ="well">
  <form action="{{action('FlightController@reservarVuelo',$f)}}" method="POST">

{{$f->id}}
capacidad: {{$f->seat->count()}}
<input type="hidden" name="id_vuelo" value="{{$f->id}}">
<input type="hidden" name="precio_vuelo" value="{{$f->precio}}">
<input type="hidden" name="fecha_ida" value="{{$f->precio}}">
<input type="hidden" name="fecha_vuelta" value="{{$f->precio}}">
<input type="hidden" name="precio_vuelo" value="{{$f->precio}}">


<input type="submit"  value="reservar">
</form>
</div>
@endforeach
</div>
