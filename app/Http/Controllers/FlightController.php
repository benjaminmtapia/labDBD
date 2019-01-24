<?php

namespace App\Http\Controllers;

use App\flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

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
        $flight =  flight::all();
        return view('flights.principal',compact('flight'));
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
        //
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
        //
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
        $origen = \App\Origin::where('ciudad',$lugar_origen)->first();
        $destino = \App\Destiny::where('ciudad',$lugar_destino)->first();
        $date = \App\Flight::where('fecha_ida',$fecha)->first();

        return view('flights.busqueda',compact('origen'));
    }
    public function reservarVuelo(Request $request){
        
    }
}
