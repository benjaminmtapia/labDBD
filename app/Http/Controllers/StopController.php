<?php

namespace App\Http\Controllers;

use App\stop;
use Illuminate\Http\Request;

class StopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $paradas = stop::all();
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
     * @param  \App\stop  $stop
     * @return \Illuminate\Http\Response
     */
    public function show(stop $stop)
    {
        $stop: stop::findOrFail($id);
         return $stop;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stop  $stop
     * @return \Illuminate\Http\Response
     */
    public function edit(stop $stop)
    {
        return view('stop.createForm')->with('stop',$stop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stop  $stop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stop $stop)
    {
        $stop->fill($request->all());
        $stop->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stop  $stop
     * @return \Illuminate\Http\Response
     */
    public function destroy(stop $stop)
    {
        //
    }
}
