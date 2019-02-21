<?php

namespace App\Http\Controllers;

use App\Secure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecureController extends Controller
{

    public function rules(){
        return[
            'tipo'=>'required|string',
            'passenger_id'=>'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Secure::all();
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
        if($validator->fails()){
            return $validator->messages();
        }   
        $secure = new \App\Secure; 
        $secure->tipo = $request->get('tipo'); 
        $secure->passenger_id = $request->get('passenger_id'); 
        return $secure; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Secure  $secure
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $secure = Secure::find($id);
        return $secure; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Secure  $secure
     * @return \Illuminate\Http\Response
     */
    public function edit(Secure $secure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Secure  $secure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Secure $secure)
    {
       $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }   
        $secure->tipo = $request->get('tipo'); 
        $secure->passenger_id = $request->get('passenger_id'); 
        return $secure; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Secure  $secure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secure $secure)
    {
        $secure->delete();//TE ODIO >:(
        return Response()->json(['success']);
    }
}
