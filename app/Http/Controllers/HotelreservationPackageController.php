<?php

namespace App\Http\Controllers;

use App\hotelreservation_package;
use Illuminate\Http\Request;

class HotelreservationPackageController extends Controller
{

    public function rules(){
        return[
            'hotel_reservation_id' => 'required|integer',
            'package_id' => 'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return hotelreservation_package::all();
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
        $hotelreservation_package = new \App\hotelreservation_package;
        $hotelreservation_package->hotel_reservation_id = $request->get('hotel_reservation_id');
        $hotelreservation_package->package_id = $request->get('package_id');
        $hotelreservation_package->save();
        return $hotelreservation_package;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hotelreservation_package  $hotelreservation_package
     * @return \Illuminate\Http\Response
     */
    public function show(hotelreservation_package $hotelreservation_package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hotelreservation_package  $hotelreservation_package
     * @return \Illuminate\Http\Response
     */
    public function edit(hotelreservation_package $hotelreservation_package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hotelreservation_package  $hotelreservation_package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hotelreservation_package $hotelreservation_package)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $hotelreservation_package->hotel_reservation_id = $request->get('hotel_reservation_id');
        $hotelreservation_package->package_id = $request->get('package_id');
        $hotelreservation_package->save();
        return $hotelreservation_package;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hotelreservation_package  $hotelreservation_package
     * @return \Illuminate\Http\Response
     */
    public function destroy(hotelreservation_package $hotelreservation_package)
    {
        $hotelreservation_package->delete();//TE ODIO >:(
        return Response()->json(['success']);
    }
}
