<?php

namespace App\Http\Controllers;

use App\room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class RoomController extends Controller
{

    public function rules(){
        return[
            'numero' => 'required|integer',
            'capacidad' => 'required|integer',
            'hotel_id' => 'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = room::all();
        return view('rooms.principal',compact('rooms'));
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
        $room = new \App\room;
        $room->numero = $request->get('numero');
        $room->capacidad = $request->get('capacidad');
        $room->hotel_id = $request->get('hotel_id');
        $room->save();
        return $room; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = room::find($id);
        return $room; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, room $room)
    {
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $room->numero = $request->get('numero');
        $room->capacidad = $request->get('capacidad');
        $room->hotel_id = $request->get('hotel_id');

        $room->save();
        return $room; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(room $room)
    {
        $room->delete();
        return response()->json([
            'success'
        ]);
    }
    
}
