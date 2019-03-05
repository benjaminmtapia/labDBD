<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function gotocheckin(Request $request){
        $reserva = \App\reservation::find($request->id_reserva);
        $seat = $reserva->seat;
        return view('checkin.passengers',compact('reserva','seat'));
    }
}
