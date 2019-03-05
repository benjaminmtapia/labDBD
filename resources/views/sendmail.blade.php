<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8">
  	<title>Email de confirmación de reserva</title>
  </head>
  <body>
  	
  	<h3>Detalles de la reserva n° {{$e_reservation->id}}.</h3>

  	<hr>

    <table class="table font-weight-normal">
          <tr>
            <th class="cell">Ítem</th>
            <th>     |     </th>
            <th class="cell">Descripción</th>
            <th>     |     </th>
            <th class="cell">Precio</th>
          </tr>
 
          @foreach($seats as $s)
          <tr>
            <th class="font-weight-normal cell">Asiento</th>
            <th>     |     </th>
            <th class="font-weight-normal cell">{{$s->tipo}} en el vuelo desde {{$s->flight->origin->ciudad}} a {{$s->flight->destiny->ciudad}}</th>
            <th>     |     </th>
            <th class="font-weight-normal cell">${{$s->precio}}</th>   
          </tr>
          @endforeach

          @foreach($cars as $c)
          <tr>
            <th class="font-weight-normal cell">Auto</th>
            <th>     |     </th>
            <th class="font-weight-normal cell">Marca: {{$c->marca}} / Modelo: {{$c->modelo}}</th>
            <th>     |     </th>
            <th class="font-weight-normal cell">${{$c->precio}}/día x {{$c->dias}} días</th>
          </tr>
          @endforeach

          @foreach($rooms as $r)
          <tr>
            <th class="font-weight-normal cell">Habitación</th>
            <th>     |     </th>
            <th class="font-weight-normal cell">En el hotel {{$r->hotel->nombre}} con capacidad para {{$r->capacidad}} persona(s)</th>
            <th>     |     </th>
            <th class="font-weight-normal cell">${{$r->precio}}/noche x {{$r->dias}} noches</th>
          </tr>
          @endforeach

          @foreach($secures as $sec)
          <tr>
            <th class="font-weight-normal cell">Seguro</th>
            <th>     |     </th>
            <th class="font-weight-normal cell">Tipo: {{$sec->tipo}}</th>
            <th>     |     </th>
            <th class="font-weight-normal cell">${{$sec->precio}}</th>
          </tr>
          @endforeach

          <tr>
            <th class="cell">Total</th>
            <th>     |     </th>
            <th class="cell"></th>
            <th>     |     </th>
            <th class="cell">${{$reservation->precio}}</th>
          </tr>
    </table>

    <hr> 

    <h3>Aerolíneas DIINF++ agradece su preferencia.</h3>

  </body>
  </html>

