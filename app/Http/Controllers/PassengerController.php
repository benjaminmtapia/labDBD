<?php

namespace App\Http\Controllers;

use App\passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{

    public function rules(){
        return[
            'nombre'=>'required|string',
            'apellido'=>'required|string'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passengers = passenger::all();
        return $passengers;
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
       $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }        
        $pasajero = new \App\passenger;
        $pasajero->nombre = $request->get('nombre');
        $pasajero->apellido = $request->get('apellido');
        $pasajero->save();
        return $pasajero;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $passenger = Passenger::find($id);
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
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }        
        $pasajero->nombre = $request->get('nombre');
        $pasajero->apellido = $request->get('apellido');
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
