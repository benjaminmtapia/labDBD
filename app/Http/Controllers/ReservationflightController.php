<?php

namespace App\Http\Controllers;

use App\reservationflight;
use Illuminate\Http\Request;

class ReservationflightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return reservationflight::all();
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
        $reservationflight = new \App\reservationflight;
        $reservationflight->flight_id = $request->get('flight_id');
        $reservationflight->reservation_id = $request->get('reservation_id');
        $reservationflight->save();
        return $reservationflight;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reservationflight  $reservationflight
     * @return \Illuminate\Http\Response
     */
    public function show(reservationflight $reservationflight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reservationflight  $reservationflight
     * @return \Illuminate\Http\Response
     */
    public function edit(reservationflight $reservationflight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reservationflight  $reservationflight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservationflight $reservationflight)
    {
        $reservationflight->flight_id = $request->get('flight_id');
        $reservationflight->reservation_id = $request->get('reservation_id');
        $reservationflight->save();
        return $reservationflight;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reservationflight  $reservationflight
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservationflight $reservationflight)
    {
        $reservationflight->delete();
        return response()->json(['success']);
    }
}
