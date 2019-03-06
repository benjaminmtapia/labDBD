<?php

namespace App\Http\Controllers;

use App\Seat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SeatController extends Controller
{

   public function rules(){
        return[
            'letra' => 'required|char',
            'numero' => 'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Seat::all();
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
        $seat = new \App\Seat;
        $seat->letra = $request->get('letra');
        $seat->numero = $request->get('numero');
        return $seat;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seat = Seat::find($id);
        return $seat;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seat $seat)
    {
       $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $seat->letra = $request->get('letra');
        $seat->numero = $request->get('numero');
        return $seat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        $seat->delete();//TE ODIO >:(
        return Response()->json(['success']);
    }

    public function reservarAsiento(Request $request){
        $id_reserva = $request->id_reserva;
        $asiento = Seat::where('reservation_id',$id_reserva);
        $id_usuario = Auth::user()->id;
        $reserva = ReservationUser::where('user_id',$id_usuario);
        return view('flights.principal');
    }
}
