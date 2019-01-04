<?php

namespace App\Http\Controllers;

use App\package_reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $package_reservations = package_reservation::all();
        

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
              
        $packagereservation = new App\package_reservation;
        $packagereservation->nombre = $request->get('nombre');
        $packagereservation->apellido = $request->get('apellido');
        $packagereservation->num_asiento = $request->get('num_asiento');
        $packagereservation->num_vuelo = $request->get('num_vuelo');
        $packagereservation->save();
        return $packagereservation;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\package_reservation  $package_reservation
     * @return \Illuminate\Http\Response
     */
    public function show(package_reservation $package_reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\package_reservation  $package_reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(package_reservation $package_reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\package_reservation  $package_reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, package_reservation $package_reservation)
    {
        $package_reservation->nombre = $request->get('nombre');
        $package_reservation->apellido = $request->get('apellido');
        $package_reservation->num_asiento = $request->get('num_asiento');
        $package_reservation->num_vuelo = $request->get('num_vuelo');
        $package_reservation->save();
        return $package_reservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\package_reservation  $package_reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(package_reservation $package_reservation)
    {
        $package_reservation->delete();
        return response()->json(['success']);
    }
}
