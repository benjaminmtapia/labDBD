<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\reservation;
use App\car;
use App\Seat;
use App\room;
use App\Secure;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Carrito::all();
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
        $carrito = new \App\Carrito;
        $carrito->fecha = Carbon::now();
        $carrito->save();
        $carrito->user_id = $request->get('user_id');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $user = Auth::user();
        $carrito = $user->carrito;
        if($carrito == null){
            $carrito = new \App\carrito;
            $carrito->user_id = $user->id;
        }
        $reservation = $user->reservation->last();
        if($reservation == null){
            $reservation = new \App\reservation;
        }
        $reservation->precio = 0;
        $id_res = $reservation->id; 
        $seats = Seat::all()->where('reservation_id', $id_res);
        $cars = car::all()->where('reservation_id', $id_res);
        $rooms = room::all()->where('reservation_id', $id_res);
        $secures = Secure::all()->where('reservation_id', $id_res);
        foreach($seats as $seat){
            $reservation->precio = $reservation->precio+ $seat->precio;
        }

        foreach($cars as $car){
            $au1 = \Carbon\Carbon::parse($car->fecha_ida); 
            $au2 = \Carbon\Carbon::parse($car->fecha_vuelta); 
            $car->dias = $au1->diffInDays($au2, false);
            $reservation->precio = $reservation->precio+ $car->dias*$car->precio;
        }

        foreach($rooms as $room){
            $ro1 = \Carbon\Carbon::parse($room->fecha_ida); 
            $ro2 = \Carbon\Carbon::parse($room->fecha_vuelta); 
            $room->dias = $ro1->diffInDays($ro2, false);
            $reservation->precio = $reservation->precio+ $room->dias*$room->precio;
        }

        foreach($secures as $secure){
            $reservation->precio = $reservation->precio+ $secure->precio;
        }
        
        $reservation->save();
        return view('carrito',compact('reservation', 'seats', 'cars', 'rooms', 'secures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrito $carrito)
    {
        //
    }

}
