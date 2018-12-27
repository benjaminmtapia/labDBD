<?php

namespace App\Http\Controllers;

use App\hotel_reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class HotelReservationController extends Controller
{

    public function rules(){
        return[
            'cantidad_personas' => 'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return hotel_reservation::all();
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
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $hotel_reservation = new \App\hotel_reservation;
        $hotel_reservation->cantidad_personas = $request->get('cantidad_personas');
        $hotel_reservation->save();
        return $hotel_reservation;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hotel_reservation  $hotel_reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel_reservation = HotelReservation::find($id);
        return $hotel_reservation; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hotel_reservation  $hotel_reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(hotel_reservation $hotel_reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hotel_reservation  $hotel_reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hotel_reservation $hotel_reservation)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $hotel_reservation->cantidad_personas = $request->get('cantidad_personas');
        $hotel_reservation->save();
        return $hotel_reservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hotel_reservation  $hotel_reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(hotel_reservation $hotel_reservation)
    {
        $hotel_reservation->delete();//TE ODIO >:(
        return Response()->json(['success']);
    }
}
