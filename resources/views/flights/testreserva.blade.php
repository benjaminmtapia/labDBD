
<div class="container">
@foreach($flights as $f)
<div class ="well">
  <form method="post" action="{{action('FlightController@reservarVuelo',$f)}}">
{{$f->id}}
<input type="submit"  value="reservar">
</form>
</div>
@endforeach
</div>