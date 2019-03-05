<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;
use Validator;
use Auth;

class HotelController extends Controller
{

    public function rules(){
        return[
            'ciudad' => 'required|string',
            'nombre' => 'required|string',
            'clase' => 'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels =  hotel::all();
        return view('hotels.principal',compact('hotels'));
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
          return view('hotels.crear');
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
        if($validator->fails()){
            return $validator->messages();
        }
        $hotel = new \App\Hotel;
        $hotel->ciudad = $request->get('ciudad');
        $hotel->nombre = $request->get('nombre');
        $hotel->clase = $request->get('clase');
        $hotel->disponible = $request->get('disponible');
        $hotel->destiny_id = $request->get('destiny_id');
        $hotel->save();
        $destino = hotel::all();
        return view('hotels.principal', compact('destino'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);
        return $hotel;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $hotel = hotel::find($id);
        if ($user->is_admin) {
          return view('hotels.editar', compact('hotel'));
        }
        else {
          abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hotel $hotel)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $hotel->ciudad = $request->get('ciudad');
        $hotel->nombre = $request->get('nombre');
        $hotel->clase = $request->get('clase');
        $hotel->disponible = $request->get('disponible');
        $hotel->destiny_id = $request->get('destiny_id');
        $hotel->save();
        $destino = hotel::all();
        return view('hotels.principal', compact('destino'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(hotel $hotel)
    {
        $hotel->delete();
        return response()->json([
            'success'
        ]);
    }

    public function verHoteles(Request $request){
        $destino = \App\Destiny::find($request->id_destino);
        $hoteles = $destino->hotel;
       return view ('hotels.buscar',compact('hoteles'));
    }
    public function verHabitaciones(Request $request){
        $hotel = \App\hotel::find($request->id_hotel);
        $habitaciones= $hotel->room;
        return view('hotels.habitacion',compact('hotel','habitaciones'));
    }

    public function buscarHotel(Request $request){

        $fecha_ida = $request->fecha_ida;
        $fecha_vuelta = $request->fecha_vuelta;
        $personas = $request->num_personas;
        $habitaciones = \App\room::where('fecha_vuelta','<=',$request->fecha_vuelta)->where('fecha_ida','>=',$request->fecha_ida)->where('capacidad','>=',$request->num_personas)->get();

        return view('hotels.buscar',compact('habitaciones'));

    }
}
