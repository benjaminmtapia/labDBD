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
    public function index()
    {
       $socios = socio::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function show(socio $socio)
    {
        $socio: socio::findOrFail($id);
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
        $socio->fill($request->all());
        $socio->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(socio $socio)
    {
        //
    }
}
