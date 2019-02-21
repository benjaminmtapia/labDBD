                @foreach($vuelo as $v)
                @if($num_pasajeros <= $v->seat->count())
                aqui hay {{$v->seat->count()}} asientos

              @endif
          @endforeach