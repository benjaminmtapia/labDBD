<?php

namespace App\Http\Controllers;

use App\airport;
use Illuminate\Http\Request;
use Validator;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rules(){
        return[
            'ciudad' => 'required|string',
            'nombre' => 'required|string'
        ];
    }
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
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $airport = new \App\airport;
        $airport->nombre = $request->get('nombre');
        $airport->ciudad = $request->get('ciudad');
        $airport->origin_id = $request->get('origin_id');
        $airport->destiny_id = $request->get('destiny_id');
        
        $airport->save();
        return $airport;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(airport $airport)
    {
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
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $airport->nombre = $request->get('nombre');
        $airport->ciudad = $request->get('ciudad');
        $airport->origin_id = $request->get('origin_id');
        $airport->destiny_id = $request->get('destiny_id');
        $airport->save();
        return $airport;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(airport $airport)
    {
        $airport->delete();
        return response()->json(['success']);
    }
}
