<?php

namespace App\Http\Controllers;

use App\airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$aeropuertos = airport::all();
        return airport::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $aeropuerto = new airport();
        $aeropuerto->name = $request->get('name');
        $aeropuerto->ciudad = $request->get('ciudad');
        $aeropuerto->id_origen = $request->get('id_origen');
        $aeropuerto->id_destino = $request->get('id_destino');
        $aeropuerto->save();
        return $aeropuerto;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(airport $airport)
    {
    $airport= airport::findOrFail($id);
    return $airport;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function edit(airport $airport)
    {
        //return view('airport.createForm')->with('aiport',$airport);  
        return view('airport.createForm')->with('airport',$airport);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, airport $airport)
    {    
        $validator = Validator::make($request->all());
        $aeropuerto->name = $request->get('name');
        $aeropuerto->ciudad = $request->get('ciudad');
        $aeropuerto->id_origen = $request->get('id_origen');
        $aeropuerto->id_destino = $request->get('id_destino');
        $aeropuerto->save();
        return $aeropuerto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(airport $airport)
    {
        $aeropuerto = airport::find($id);
        $aeropuerto->delete();
        return;
    }
}
