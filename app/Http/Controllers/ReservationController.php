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
    public function rules(){
        return[
            'monto'=>'required|integer',
            'num_pasaporte'=>'required|integer',
            'num_reserva_hotel'=>'required|integer',
        ];
    }
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
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $reservation = new passenger();
        $reservation->id = $request->get('id');
        $reservation->monto = $request->get('monto');
        $reservation->num_pasaporte = $request->get('num_pasaporte');
        $reservation->num_reserva_hotel = $request->get('num_reserva_hotel');

        $reservation->save();
        return $reservation;
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
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $reservation = new \App\reservation;
        $reservation->monto = $request->get('monto');
        $reservation->num_pasaporte = $request->get('num_pasaporte');
        $reservation->num_reserva_hotel = $request->get('num_reserva_hotel');
        
        $reservation->save();
        return $reservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservation $reservation)
    {
        $reserva->delete();
        return response()->json(['success']);
    }
}
