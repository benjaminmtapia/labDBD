<?php

namespace App\Http\Controllers;
use \App\ReservationUser;
use Illuminate\Http\Request;

class ReservationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReservationUser::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ReservationUser = new \App\ReservationUser;
        $ReservationUser->user_id = $request->get('user_id');
        $ReservationUser->reservation_id = $request->get('reservation_id');
        $ReservationUser->save();
        return $ReservationUser;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservationUser  $ReservationUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ReservationUser = ReservationUser::find($id);
        return $ReservationUser; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservationUser  $ReservationUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationUser $ReservationUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservationUser  $ReservationUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservationUser $ReservationUser)
    {
        $ReservationUser->user_id = $request->get('user_id');
        $ReservationUser->reservation_id = $request->get('reservation_id');
        $ReservationUser->save();
        return $ReservationUser;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservationUser  $ReservationUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationUser $ReservationUser)
    {
        $ReservationUser->delete();
        return response()->json(['success']);
    }
}
