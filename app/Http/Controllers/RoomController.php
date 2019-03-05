<?php

namespace App\Http\Controllers;

use App\room;
use App\Carrito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use Auth;
use Carbon\Carbon;

class RoomController extends Controller
{

    public function rules(){
        return[
            'numero' => 'required|integer',
            'capacidad' => 'required|integer',
            'fecha_ida' => 'required|date',
            'fecha_vuelta' => 'required|date',
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
        $room->fecha_ida = $request->get('fecha_ida');
        $room->fecha_vuelta = $request->get('fecha_vuelta');
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
        $room->fecha_ida = $request->get('fecha_ida');
        $room->fecha_vuelta = $request->get('fecha_vuelta');
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
    
    public function reservarHabitacion(Request $request){
        $habitacion = \App\room::find($request->id_habitacion);
        $user = Auth::user();
        $carrito = $user->carrito; 
        if ($carrito == null){
            $carrito = new \app\Carrito;
            $carrito->fecha = Carbon::now();
            $carrito->user_id = $user->id;
            $carrito->save;
        }        
        $reserva_aux = $user->reservation->last();
        if($reserva_aux == null){
            $reserva = new \App\reservation;
            $reserva->precio = $reserva->precio + $habitacion->precio;
            $reserva->user_id = $user->id;
            $reserva->fecha_reserva = Carbon::now();
            $reserva->disponibilidad = true;
            $habitacion->reservation_id = $reserva->id;
            $habitacion->disponible = false;
            $habitacion->save();
            $reserva->save();

        }
        else{
            $booleano = \App\reservation::all()->last()->disponibilidad;
            if($booleano == false){
                $reserva = new \App\reservation;
                $reserva->precio = $reserva->precio + $habitacion->precio;
                $habitacion->disponible = false;
                $reserva->user_id = $user->id;
                $reserva->fecha_reserva= Carbon::now();
                $reserva->disponibilidad = true;
                $habitacion->reservation_id = $reserva->id;
                $habitacion->save();
                $reserva->save();
            }
            else{
                $reserva = \App\reservation::all()->last();
                $reserva->precio = $reserva->precio+ $habitacion->precio;
                $habitacion->disponible = false;
                $habitacion->reservation_id = $reserva->id;
                $habitacion->save();
                $reserva->save();
            }
        }
        $habitacion->reservation_id = $reserva->id;
        $habitacion->disponible = false;
        $habitacion->save();
        //return view('cart',compact('reserva'));
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }

    public function quitarDelCarrito(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $habitacion = \App\room::find($request->id_habitacion); 
        $habitacion->reservation_id = null;
        $habitacion->disponible = true;
        $habitacion->save();
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }

}
