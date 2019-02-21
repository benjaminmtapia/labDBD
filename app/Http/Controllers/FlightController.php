<?php

namespace App\Http\Controllers;

use App\flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
use Auth;
use Carbon\Carbon;
class FlightController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function rules(){
         return[
             'fecha_ida' => 'required|date',
             'capacidad' => 'required|integer',
             'num_pasajeros' => 'required|integer'
         ];
     }
    public function index()
    {
        $flights =  flight::all();
    
        return view('flights.principal',compact('flights'));
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
        if ($validator->fails()) {
          return $validator->messages();
        }
        $vuelo = new \App\flight;
        $vuelo->fecha_ida = $request->get('fecha_ida');
        $vuelo->num_pasajeros = $request->get('num_pasajeros');
        $vuelo->capacidad = $request->get('capacidad');
        $vuelo->precio = $request->get('precio');
        $vuelo->save();
        return $vuelo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return flight::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, flight $flight)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
          return $validator->messages();
        }
        $vuelo->fecha_ida = $request->get('fecha_ida');
        $vuelo->num_pasajeros = $request->get('num_pasajeros');
        $vuelo->capacidad = $request->get('capacidad');
        $vuelo->precio = $request->get('precio');
        $vuelo->save();
        return $vuelo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(flight $flight)
    {
        $flight->delete();
        return response()->json(['success']);
    }

    public function reservaVuelo(Request $request){
        $id_origen = $request->origin_id;
        $id_destino = $request->destiny_id;
        $origen = flight::where('origin_id',$id_origen)->first();
        $destino = flight::where('destiny_id',$id_destino)->first();

        //$reserva = reservation::where('')
        return ;
    }
    public function buscar(Request $request){
        $lugar_origen = $request->lugar_origen;
        $lugar_destino = $request->lugar_destino;
        $fecha = $request->fecha;
        $origen = \App\Origin::where('ciudad',$lugar_origen);
        $destino = \App\Destiny::where('ciudad',$lugar_destino);
        $vuelo = \App\Flight::where('fecha_ida',$fecha)->get();
        $num_pasajeros = $request->num_pasajeros;
        return view('flights.busquedaporfecha')->with(compact('vuelo','num_pasajeros'));
        
    }
    public function buscarporfecha(Request $request){
        $vuelo = $request;
        $fecha = $request->fecha;
        $date = \App\Flight::where('fecha_ida',$fecha)->first();
        if(empty($fecha)){
            return view('flights.null');
        }
        return view('flights.busquedaporfecha',compact('date','origen','destino'));
    }
public function reservarVuelo(Request $request){
         $vuelo = \App\Flight::find($request->id_vuelo);

         $user = Auth::user();
         $reserva_aux = $user->reservation->last();
         if ($reserva_aux==null) {
             $reserva = new \App\reservation;
             $reserva->precio = $reserva->precio+ $vuelo->precio;
             $reserva->user_id = $user->id;
             $reserva->fecha_reserva = Carbon::now();
             $reserva->disponibilidad= true;
             $reserva->save();
         }
         else{
            $booleano = \App\reservation::all()->last()->disponibilidad;
            if($booleano==false){
                 $reserva = new \App\reservation;
             $reserva->precio = $reserva->precio+ $vuelo->precio;
             $reserva->user_id = $user->id;
              $reserva->fecha_reserva = Carbon::now();
             $reserva->disponibilidad= true;
             $reserva->save();

            }
            else{
                $reserva = \App\reservation::all()->last();
                 $reserva->precio = $reserva->precio+ $request->precio_vuelo;
                 $reserva->save();
                 
            }

         }
         return view('cart',compact('reserva'));
    }

}
