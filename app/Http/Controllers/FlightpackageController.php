<?php

namespace App\Http\Controllers;

use App\flightpackage;
use Illuminate\Http\Request;

class FlightpackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return flightpackage::all();
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
      $flightpackage = new \App\flightpackage;
      $flightpackage->flight_id = $request->get('flight_id');
      $flightpackage->package_id = $request->get('package_id');
      $flightpackage->save();
      return $flightpackage;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\flightpackage  $flightpackage
     * @return \Illuminate\Http\Response
     */
    public function show(flightpackage $flightpackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\flightpackage  $flightpackage
     * @return \Illuminate\Http\Response
     */
    public function edit(flightpackage $flightpackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\flightpackage  $flightpackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, flightpackage $flightpackage)
    {
      $flightpackage->flight_id = $request->get('flight_id');
      $flightpackage->package_id = $request->get('package_id');
      $flightpackage->save();
      return $flightpackage;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\flightpackage  $flightpackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(flightpackage $flightpackage)
    {
      $flightpackage->delete();
      return response()->json(['success']);
    }
}
