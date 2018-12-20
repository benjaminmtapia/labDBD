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
         $pasajero = passenger::all();
        return;
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
        $pasajero = new passenger;
        $pasajero->nombre = $request->nombre;
        $pasajero->apellido = $request->apellido;
        $pasajero->num_asiento = $request->num_asiento;
        $pasajero->num_vuelo = $request->num_vuelo;
        return pasajero;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(passenger $passenger)
    {
          $passenger: passenger::findOrFail($id);
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
        $passenger->fill($request->all());
        $passenger->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(passenger $passenger)
    {
        $pasajero = passenger::find($id);
        $pasajero->delete();
        return 0;
    }
}
