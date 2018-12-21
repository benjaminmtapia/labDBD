<?php

namespace App\Http\Controllers;

use App\reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $reserva = reservation::all();
        return $reserva;
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
        $validator = Validator::make($request->all());
        $reserva = new passenger();
        $reserva->id = $request->get('id');
        $reserva->monto = $request->get('monto');
        $reserva->num_pasaporte = $request->get('num_pasaporte');
        $reserva->num_reserva_hotel = $request->get('num_reserva_hotel');

        $reserva->save();
        return $reserva;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(reservation $reservation)
    {
        return $reservation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(reservation $reservation)
    {
        return view('reservation.createForm')->with('reservation',$reservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservation $reservation)
    {
        $validator = Validator::make($request->all());
        $reserva = new passenger();
        $reserva->id = $request->get('id');
        $reserva->monto = $request->get('monto');
        $reserva->num_pasaporte = $request->get('num_pasaporte');
        $reserva->num_reserva_hotel = $request->get('num_reserva_hotel');
        
        $reserva->save();
        return $reserva;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservation $reservation)
    {
        $reserva = reservation::find($id);
        $reserva->delete();
        return 0;
    }
}
