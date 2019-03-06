<?php

namespace App\Http\Controllers;

use App\flight;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
use Auth;
use Session;
use Carbon\Carbon;
use App\Carrito;
class FlightController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function rules(){
         return[
             'precio' => 'required|integer',
             'fecha_ida' => 'required|date',
             'fecha_vuelta' => 'required|date',
             'origin_id' => 'required|integer',
             'destiny_id' => 'required|integer'
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
        $user = Auth::user();
        if ($user->is_admin) {
          return view('flights.crear');
        }
        else {
          abort(401);
        }
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
        $user = Auth::user();
        if ($user->is_admin) {
          $vuelo = new \App\flight;
          $vuelo->fecha_ida = $request->get('fecha_ida');
          $vuelo->fecha_vuelta = $request->get('fecha_vuelta');
          $vuelo->precio = $request->get('precio');
          $vuelo->origin_id = $request->get('origin_id');
          $vuelo->destiny_id = $request->get('destiny_id');
          $vuelo->package_id = $request->get('package_id');
          $vuelo->save();
          $flights = flight::all();
          return view('flights.principal', compact('flights'));
        }
        else {
          abort(401);
        }
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
    public function edit($id)
    {
      $user = Auth::user();
      $flight = flight::find($id);
      if ($user->is_admin) {
        return view('flights.editar', compact('flight'));
      }
      else {
        abort(401);
      }
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
        $flight->fecha_ida = $request->get('fecha_ida');
        $flight->fecha_vuelta = $request->get('fecha_vuelta');
        $flight->precio = $request->get('precio');
        $flight->origin_id = $request->get('origin_id');
        $flight->destiny_id = $request->get('destiny_id');
        $flight->package_id = $request->get('package_id');
        $flight->save();
        $flights = flight::all();
        Session::flash('flash_message', 'Vuelo editado');
        return view('flights.principal', compact('flights'));
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

    public function buscar(Request $request){
        $lugar_origen = $request->lugar_origen;
        $lugar_destino = $request->lugar_destino;
        $fecha_ida = $request->fecha_ida;
        $origen = \App\Origin::where('ciudad',$lugar_origen);
        $destino = \App\Destiny::where('ciudad',$lugar_destino);
        $vuelo = \App\Flight::where('fecha_ida',$fecha_ida)->get();
        $num_pasajeros = $request->num_pasajeros;
        $vuelos=[];
        if($request->fecha_vuelta==null){
        foreach ($vuelo as $v) {
             $num_asientos = $v->seat->count();
            if($num_asientos>=$num_pasajeros){
                $vuelos[]= $v;
                }
            }
        }
        else{
            $vuelo = \App\Flight::where('fecha_ida',$fecha_ida)->where('fecha_vuelta',$request->fecha_vuelta)->get();
            foreach ($vuelo as $v) {
             $num_asientos = $v->seat->count();
            if($num_asientos>=$num_pasajeros){
                $vuelos[]= $v;
                }
            }
        }
        return view('flights.busqueda')->with(compact('vuelos','num_pasajeros'));

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

    public function reservarAsiento(Request $request){
        $seat = \App\Seat::find($request->id_asiento);

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
            $reserva->save();
        }
        else{
            $booleano = \App\reservation::all()->last()->disponibilidad;
            if($booleano==false){
                $reserva = new \App\reservation;
                $reserva = Str::random(16);
                $reserva->precio = $reserva->precio+ $seat->precio;
                $reserva->user_id = $user->id;
                $reserva->fecha_reserva = Carbon::now();
                $reserva->disponibilidad= true;
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
//        return view('cart',compact('reserva'));
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }

    public function verDetalle(Request $request){
        $flights = \App\Flight::find($request->id_vuelo);
        return view('flights.detalle', compact('flights'));
    }

    public function verAsientos(Request $request){
        $vuelo = \App\Flight::find($request->id_vuelo);
        $asientos = $vuelo->seat;
        return view('flights.seats',compact('asientos'));
    }
    public function inscribirPasajero(Request $request){
        $asiento = \App\Seat::find($request->id_asiento);
        return view('flights.pasajero',compact('asiento'));
    }
}
