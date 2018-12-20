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
        $aeropuertos = airport::all();
        return;
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
        $aeropuerto = new airport;
        $aeropuerto->name = $request->name;
        $aeropuerto->ciudad = $request->ciudad;
        $aeropuerto->id_origen = $request->id_origen;
        $aeropuerto->id_destino = $request->id_destino;
        return aeropuerto;
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
          $airport->fill($request->all());
            $airport->save(); 
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
        return 0;
    }
}
