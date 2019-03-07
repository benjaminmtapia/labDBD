<?php

namespace App\Http\Controllers;

use App\check_in;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use Illuminate\Support\Str;
class CheckInController extends Controller
{
    public function rules(){
        return[
            'nacionalidad' => 'required|string'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check_in = check_in::all();
        return view('checkin.checkin',compact('check_in'));
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
        $check_in = new \App\check_in;
        $check_in->genero = $request->get('gender');
        $check_in->email= $request->get('mail');
        $check_in->nacionalidad= $request->get('nacionalidad');
        $check_in->nombre_contacto= $request->get('nombre_contacto');
        $check_in->telefono_contacto= $request->get('telefono_contacto');
        $check_in->passenger_id = $request->get('id_pasajero');

        $check_in->reservation_id = $request->get('id_reserva');

        $check_in->save();
        return $check_in;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $check_in = CheckIn::find($id);
        return $check_in;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function edit(check_in $check_in)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, check_in $check_in)
    {
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $check_in->apellidoP = $request->get('apellidoP');
        $check_in->save();
        return $check_in;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function destroy(check_in $check_in)
    {
        $check_in->delete();
        return response()->json(['success']);
    }
    public function realizarCheckin(Request $request){
        $passenger = \App\passenger::find($request->passenger_id);
        $asiento = \App\Seat::find($request->id_asiento);

        return view('checkin.checkin',compact('passenger','asiento'));
    }

    public function finalizarCheckin(Request $request){
        $check_in = self::store($request);
        $user = Auth::user();
        $asiento = $check_in->passenger->seat;
        $asiento->check_in = true;
        $asiento->save();
        $reserva = \App\reservation::find($request->id_reserva);
        $seat = $reserva->seat;
        activity('Checkin')
            ->performedOn($user)
            ->causedBy($user)
            ->withProperties([
                 'causante'    => $user->name,
              ])
            ->log("Realiza check-in");
        return view('checkin.passengers',compact('reserva','seat'));
    }
}
