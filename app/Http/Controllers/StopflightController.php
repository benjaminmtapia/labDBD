<?php

namespace App\Http\Controllers;

use App\stopflight;
use Illuminate\Http\Request;

class StopflightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return stopflight::all();
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
      $stopflight = new \App\stopflight;
      $stopflight->flight_id = $request->get('flight_id');
      $stopflight->stop_id = $request->get('stop_id');
      $stopflight->save();
      return $stopflight;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stopflight  $stopflight
     * @return \Illuminate\Http\Response
     */
    public function show(stopflight $stopflight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stopflight  $stopflight
     * @return \Illuminate\Http\Response
     */
    public function edit(stopflight $stopflight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stopflight  $stopflight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stopflight $stopflight)
    {
      $stopflight->flight_id = $request->get('flight_id');
      $stopflight->stop_id = $request->get('stop_id');
      $stopflight->save();
      return $stopflight;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stopflight  $stopflight
     * @return \Illuminate\Http\Response
     */
    public function destroy(stopflight $stopflight)
    {
      $stopflight->delete();
      return response()->json(['success']);
    }
}
