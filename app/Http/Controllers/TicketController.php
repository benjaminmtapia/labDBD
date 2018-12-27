<?php

namespace App\Http\Controllers;

use App\ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $validator = Validator::make($request->all());
        $pasaje = new ticket();
        $pasaje->num_asiento = $request->get('num_asiento');
        $pasaje->hora = $request->get('hora');
        $pasaje->origen = $request->get('origen');
        $pasaje->destino = $request->get('destino');
        $pasaje->doc_identificacion = $request->get('doc_identificacion');
        $pasaje->tipo_pasajero = $request->get('tipo_pasajero');
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
        $validator = Validator::make($request->all());
        $ticket->num_asiento = $request->get('num_asiento');
        $ticket->hora = $request->get('hora');
        $ticket->origen = $request->get('origen');
        $ticket->destino = $request->get('destino');
        $ticket->doc_identificacion = $request->get('doc_identificacion');
        $ticket->tipo_pasajero = $request->get('tipo_pasajero');
        $ticket->save();
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
