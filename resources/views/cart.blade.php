
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
    </ul>
  
  </div>
</nav>

<div class="container" style ="margin-top:20px;">
  <h1>Reserva n°{{$reserva->id}}</h1>
  monto = ${{$reserva->precio}}
 
</div>