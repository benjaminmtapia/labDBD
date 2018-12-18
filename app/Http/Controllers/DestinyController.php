<?php

namespace App\Http\Controllers;

use App\Destiny;
use Illuminate\Http\Request;

class DestinyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destino = destiny::all();
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
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function show(Destiny $destiny)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function edit(Destiny $destiny)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destiny $destiny)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destiny $destiny)
    {
        $destino = destiny::find($id);
        $destino->delete();
        return 0;
    }
}
