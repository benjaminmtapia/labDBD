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
        $destino = Destiny::all();
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
        $destino = new Destiny;
        $destino->name = $request->name;
        return destino;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function show(Destiny $destiny)
    {
    $destiny: Destiny::findOrFail($id);
    return $destiny;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function edit(Destiny $destiny)
    {
         return view('destiny.createForm')->with('destiny',$destiny);
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
        $destiny->fill($request->all());
        $destiny->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destiny $destiny)
    {
        $destino = Destiny::find($id);
        $destino->delete();
        return 0;
    }
}
