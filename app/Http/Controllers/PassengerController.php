<?php

namespace App\Http\Controllers;

use App\passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $pasajero = passenger::all();
       
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
        $pasajero = new passenger();
        $pasajero->nombre = $request->get('nombre');
        $pasajero->apellido = $request->get('apellido');
        $pasajero->flight_id = $request->get('flight_id');
        $pasajero->save();
        return $pasajero;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(passenger $passenger)
    {
        return $passenger;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit(passenger $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, passenger $passenger)
    {
        $pasajero = new passenger();
        $pasajero->nombre = $request->get('nombre');
        $pasajero->apellido = $request->get('apellido');
        $pasajero->flight_id = $request->get('flight_id');
        $pasajero->save();
        return $pasajero;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(passenger $passenger)
    {
        $passenger->delete();
        return response()->json(['success']);
    }
}
