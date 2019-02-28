<?php

namespace App\Http\Controllers;

use App\car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use \App\ReservationUser;
use \App\reservation;
use Auth;
use \App\User;
use Carbon\Carbon;
class CarController extends Controller
{

    public function rules(){
        return[
            'patente' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'capacidad' => 'required|integer',
            'precio' => 'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = car::all();
        return view('cars.principal',compact('cars'));
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
        $car = new \App\car;
        $car->patente = $request->get('patente');
        $car->marca = $request->get('marca');
        $car->modelo = $request->get('modelo');
        $car->capacidad = $request->get('capacidad');
        $car->precio = $request->get('precio');
        $car->reservation_id = $request->get('reservation_id');
        $car->package_id = $request->get('package_id');
        $car->save();
        return $car;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return $car; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, car $car)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $car->patente = $request->get('patente');
        $car->marca = $request->get('marca');
        $car->modelo = $request->get('modelo');
        $car->capacidad = $request->get('capacidad');
        $car->precio = $request->get('precio');
        $car->reservation_id = $request->get('reservation_id');
        $car->package_id = $request->get('package_id');
        $car->save();
        return $car;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(car $car)
    {
        $car->delete();
        return response()->json([
            'success'
        ]);
    }

    public function reservarAuto(Request $request){
        $auto = \App\Car::find($request->id_auto);
        $user = Auth::user();
        //dd($user->name);
        $reserva_aux = $user->reservation->last();
        if ($reserva_aux==null) {
            $reserva = new \App\reservation;
            $reserva->precio = $reserva->precio + $auto->precio;
            $reserva->user_id = $user->id;
            $reserva->fecha_reserva = Carbon::now();
            $reserva->disponibilidad= true;
            $reserva->save();
        }
        else{
            $booleano = \App\reservation::all()->last()->disponibilidad;
            if($booleano==false){
                $reserva = new \App\reservation;
                $reserva->precio = $reserva->precio + $auto->precio;
                $reserva->user_id = $user->id;
                $reserva->fecha_reserva = Carbon::now();
                $reserva->save();
            }
            else{
                $reserva = \App\reservation::all()->last();
                $reserva->precio = $reserva->precio + $auto->precio;
                $reserva->save();
            }
        }
        $auto->reservation_id = $reserva->id;
        $auto->disponibilidad = false;
        $auto->save();
        return view('cart',compact('reserva','request'));
    }

    public function buscarAuto(Request $request){
        $fecha_ida = $request->fecha_ida;
        $fecha_vuelta = $request->fecha_vuelta;
        $lugar_arriendo = $request->lugar_arriendo;
        $autos = \App\car::where('fecha_ida','>=',$request->fecha_ida)->where('fecha_vuelta','<=',$request->fecha_vuelta)->get();
        $cars=[];
        foreach ($autos as $auto) {
            if($auto->destiny->ciudad == $request->lugar_arriendo){
                $cars[]=$auto;
            }
        }
        return view('cars.buscar',compact('cars'));
    }
}
