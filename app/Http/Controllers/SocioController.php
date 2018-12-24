<?php

namespace App\Http\Controllers;

use App\socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rules(){
        return[
            'numero'=>'required|integer',
            'email'=>'required|string',
            'millas'=>'required|integer'
        ];
    }
    public function index()
    {
       return socio::all();
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
        $socio = new \App\socio;
        $socio->numero = $request->get('numero');
        $socio->email = $request->get('email');
        $socio->millas = $request->get('millas');
        $socio->save();
        return $socio;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function show(socio $socio)
    {
        return $socio;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function edit(socio $socio)
    {
        return view('socio.createForm')->with('socio',$socio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, socio $socio)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $socio->numero = $request->get('numero');
        $socio->email = $request->get('email');
        $socio->millas = $request->get('millas');
        $socio->save();
        return $socio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(socio $socio)
    {
        $socio->delete();
        return response()->json(['success']);
    }
}
