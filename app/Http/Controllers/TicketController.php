<?php

namespace App\Http\Controllers;

use App\ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function rules(){
         return[
             'num_asiento' => 'required|integer',
             'origen' => 'required|string',
             'destino' => 'required|string',
             'doc_identificacion' => 'required|string',
             'tipo_pasajero' => 'required|string'
         ];
     }
    public function index()
    {
        return ticket::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
        }
          return $validator->messages();
        $pasaje = new \App\ticket;
        $pasaje->num_asiento = $request->get('num_asiento');
        $pasaje->hora = $request->get('hora');
        $pasaje->origen = $request->get('origen');
        $pasaje->destino = $request->get('destino');
        $pasaje->tipo_pasajero = $request->get('tipo_pasajero');
        $pasaje->doc_identificacion = $request->get('doc_identificacion');
        $pasaje->reservation_id = $request->get('reservation_id');
        $pasaje->flight_id = $request->get('flight_id');
        $pasaje->save();
        return $pasaje;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(ticket $ticket)
    {
        return $ticket;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ticket $ticket)
    {
        if ($validator->fails()) {
        $validator = Validator::make($request->all(), $this->rules());
          return $validator->messages();
        }
        $ticket->num_asiento = $request->get('num_asiento');
        $ticket->hora = $request->get('hora');
        $ticket->origen = $request->get('origen');
        $ticket->destino = $request->get('destino');
        $ticket->doc_identificacion = $request->get('doc_identificacion');
        $ticket->tipo_pasajero = $request->get('tipo_pasajero');
        $ticket->flight_id = $request->get('flight_id');
        $ticket->save();
        $ticket->reservation_id = $request->get('reservation_id');
        return $ticket;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(ticket $ticket)
    {
        $ticket->delete();
        return response()->json(['success']);
    }
}
