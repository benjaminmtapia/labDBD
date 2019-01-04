<?php

namespace App\Http\Controllers;

use App\reservationpackage;
use Illuminate\Http\Request;

class ReservationpackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return reservationpackage::all();
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
        $reservationpackage = new \App\reservationpackage;
        $reservationpackage->reservation_id = $request->get('reservation_id');
        $reservationpackage->package_id = $request->get('package_id');
        $reservationpackage->save();
        return $reservationpackage;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reservationpackage  $reservationpackage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservationpackage = reservationpackage::find($id);
        return $reservationpackage; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reservationpackage  $reservationpackage
     * @return \Illuminate\Http\Response
     */
    public function edit(reservationpackage $reservationpackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reservationpackage  $reservationpackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservationpackage $reservationpackage)
    {
        $reservationpackage->reservation_id = $request->get('reservation_id');
        $reservationpackage->package_id = $request->get('package_id');
        $reservationpackage->save();
        return $reservationpackage;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reservationpackage  $reservationpackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservationpackage $reservationpackage)
    {
        $reservationpackage->delete();
        return response()->json(['success']);
    }
}
