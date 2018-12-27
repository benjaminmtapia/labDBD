<?php

namespace App\Http\Controllers;

use App\flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function rules(){
         return[
             'fecha_ida' => 'required|date',
             'capacidad' => 'required|integer',
             'num_pasajeros' => 'required|integer'
         ];
     }
    public function index()
    {
        return flight::all();
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
          return $validator->messages();
        }
        $vuelo = new App\flight;
        $vuelo->fecha_ida = $request->get('fecha_ida');
        $vuelo->capacidad = $request->get('capacidad');
        $vuelo->num_pasajeros = $request->get('num_pasajeros');
        $vuelo->save();
        return $vuelo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(flight $flight)
    {
        return $flight;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, flight $flight)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
          return $validator->messages();
        }
        $flight->fecha_ida = $request->get('fecha_ida');
        $flight->capacidad = $request->get('capacidad');
        $flight->num_pasajeros = $request->get('num_pasajeros');
        $flight->save();
        return $flight;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(flight $flight)
    {
        $flight->delete();
        return response()->json(['success']);
    }
}
