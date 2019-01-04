<?php

namespace App\Http\Controllers;

use App\reservation_administrator;
use Illuminate\Http\Request;

class ReservationAdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return reservation_administrator::all();
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
        $reservation_administrator = new \App\reservation_administrator;
        $reservation_administrator->reservation_id = $request->get('reservation_id');
        $reservation_administrator->administrator_id = $request->get('administrator_id');
        $reservation_administrator->save();
        return $reservation_administrator;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reservation_administrator  $reservation_administrator
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation_administrator = reservation_administrator::find($id);
        return $reservation_administrator; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reservation_administrator  $reservation_administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(reservation_administrator $reservation_administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reservation_administrator  $reservation_administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservation_administrator $reservation_administrator)
    {
        $reservation_administrator->reservation_id = $request->get('reservation_id');
        $reservation_administrator->administrator_id = $request->get('administrator_id');
        $reservation_administrator->save();
        return $reservation_administrator;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reservation_administrator  $reservation_administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservation_administrator $reservation_administrator)
    {
        $reservation_administrator->delete();
        return response()->json(['success']);
    }
}
