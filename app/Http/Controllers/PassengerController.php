<?php

namespace App\Http\Controllers;

use App\passenger;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Redirect;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Carrito;
use App\Seat;

class PassengerController extends Controller
{

    public function rules(){
        return[
            'nombre'=>'required|string',
            'apellido'=>'required|string',
            'edad'=>'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passengers = passenger::all();
        return $passengers;
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
        $pasajero = new \App\passenger;
        $pasajero->nombre = $request->get('nombre');
        $pasajero->apellido = $request->get('apellido');
        $pasajero->edad = $request->get('edad');
        $pasajero->save();
        return $pasajero;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $passenger = Passenger::find($id);
        return $passenger;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit(passenger $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, passenger $passenger)
    {
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $pasajero->nombre = $request->get('nombre');
        $pasajero->apellido = $request->get('apellido');
        $pasajero->edad = $request->get('pasajero');
        $pasajero->save();
        return $pasajero;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(passenger $passenger)
    {
        $passenger->delete();
        return response()->json(['success']);
    }

    public function reservarAsiento(Request $request){
        $seat = \App\Seat::find($request->seat_id);
        $pasajero = self::store($request);
        $seat->passenger_id = $pasajero->id;
        $user = Auth::user();
        $carrito = $user->carrito;
        if ($carrito == null){
            $carrito = new \app\Carrito;
            $carrito->fecha = Carbon::now();
            $carrito->user_id = $user->id;
            $carrito->save;
        }
        $reserva_aux = $user->reservation->last();
        if ($reserva_aux==null) {
            $reserva = new \App\reservation;
            $reserva->cod_reserva = Str::random(16);
            $reserva->precio = $reserva->precio+ $seat->precio;
            $reserva->user_id = $user->id;
            $reserva->fecha_reserva = Carbon::now();
            $reserva->disponibilidad= true;
            $seat->disponibilidad = false;
            $reserva->save();
        }
        else{
            $booleano = \App\reservation::all()->last()->disponibilidad;
            if($booleano==false){
                $reserva = new \App\reservation;
                $reserva->cod_reserva = Str::random(16);
                $reserva->precio = $reserva->precio+ $seat->precio;
                $reserva->user_id = $user->id;
                $reserva->fecha_reserva = Carbon::now();
                $reserva->disponibilidad= true;
                $seat->disponibilidad = false;
                $reserva->save();
            }
            else{
                $reserva = \App\reservation::all()->last();
                $reserva->precio = $reserva->precio+ $seat->precio;
                $reserva->save();
            }
        }
        $seat->reservation_id = $reserva->id;
        $seat->disponibilidad=false;
        $seat->save();
        activity('Asiento')
            ->performedOn($user)
            ->causedBy($user)
            ->withProperties([
                 'causante'    => $user->name,
              ])
            ->log('Reserva de Asiento');
      //return redirect::back()->withErrors(['msg', 'Asiento reservado']);
       // return redirect()->to('flights')->withErrors(['msg','Asiento reservado']);
        return redirect()->action('CarritoController@show',['id' => $user->id]);
        //return view('cart',compact('reserva'));
    }

    public function quitarDelCarrito(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $asiento = \App\Seat::find($request->id_asiento);
        $id_as = $asiento->id;
        $asiento->reservation_id = null;
        $asiento->disponibilidad = true;
        $asiento->passenger_id = null;
        $asiento->save();
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }
}
