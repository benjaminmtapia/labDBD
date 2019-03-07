<?php

namespace App\Http\Controllers;

use App\package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\car;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
class PackageController extends Controller
{

    public function rules(){
        return[
            'precio' => 'required|integer',
            'reservation_id' => 'required|integer',
        ];
    }   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paquetes= package::all();
        foreach ($paquetes as $paquete){
            $car = $paquete->car()->first();
            $flight = $paquete->flight()->first();
            $room = $paquete->room()->first();
            $paquete->precio = 0;
            if($car != null){
                $au1 = \Carbon\Carbon::parse($car->fecha_ida); 
                $au2 = \Carbon\Carbon::parse($car->fecha_vuelta); 
                $car->dias = $au1->diffInDays($au2, false);
                $car->save();
                $paquete->precio += $car->dias*$car->precio; 
            }

            if($room != null){
                $ro1 = \Carbon\Carbon::parse($room->fecha_ida); 
                $ro2 = \Carbon\Carbon::parse($room->fecha_vuelta); 
                $room->dias = $ro1->diffInDays($ro2, false);
                $room->save();
                $paquete->precio += $room->dias*$room->precio;
            }

            if($flight != null){
                $paquete->precio += $flight->precio;
            }
            $paquete->save();
        }
        //$autos = car::where('package_id',$paquetes->id);
        return view('packages.principal',compact('paquetes'));

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
        $package = new \App\package;
        $package->precio = $request->get('precio');
        $package->reservation_id = $request->get('reservation_id');        
        $package->save();
        return $package;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\package  $package
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id);
        return $package; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, package $package)
    {
/*        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }   */
        $package->precio = $request->get('precio');
        $package->reservation_id = $request->get('reservation_id');        
        $package->save();
        return $package;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(package $package)
    {
        $package->delete();
        return response()->json(['success']);
    }

    public function reservarPaquete(Request $request){
        $paquete = \App\package::find($request->id_paquete);
        $user = Auth::user();
        $carrito = $user->carrito;
        if ($carrito == null OR $carrito->disponibilidad == false){
            $carrito = new \app\Carrito;
            $carrito->fecha = Carbon::now();
            $carrito->user_id = $user->id;
            $carrito->save();
        }       
        $reserva_aux = $user->reservation->last();
        if($reserva_aux == null){
            $reserva = new \App\reservation;
            $reserva->cod_reserva = Str::random(16);
            $reserva->precio = $reserva->precio + $paquete->precio;
            $reserva->user_id = $user->id;
            $reserva->fecha_reserva = Carbon::now();
            $reserva->disponibilidad = true;
            $paquete->reservation_id = $reserva->id;
            $paquete->disponible = false;
            $paquete->save();
            $reserva->save();

        }
        else{
            $booleano = \App\reservation::all()->last()->disponibilidad;
            if($booleano == false){
                $reserva = new \App\reservation;
                $reserva->cod_reserva = Str::random(16);
                $reserva->precio = $reserva->precio + $paquete->precio;
                $paquete->disponible = false;
                
/*                $car = $paquete->car()->first();
                $room = $paquete->room()->first();      */

     /*           $car->disponibilidad = false; 
                $room->disponible = false;*/

                $reserva->user_id = $user->id;
                $reserva->fecha_reserva= Carbon::now();
                $reserva->disponibilidad = true;
                $paquete->reservation_id = $reserva->id;
                $paquete->save();
                $reserva->save();
            }
            else{
                $reserva = \App\reservation::all()->last();
                $reserva->precio = $reserva->precio+ $paquete->precio;
                $paquete->disponible = false;
                $paquete->reservation_id = $reserva->id;
                $paquete->save();
                $reserva->save();
            }
        }
        $paquete->reservation_id = $reserva->id;
        $paquete->disponible = false;
        $paquete->save();
        activity('Paquete')
            ->performedOn($user)
            ->causedBy($user)
            ->withProperties([
                 'causante'    => $user->name,
              ])
            ->log('Reserva de Auto');        
        //return view('cart',compact('reserva'));
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }
    public function inscribirPasajero(Request $request){
        $package = \App\package::find($request->id_paquete);
        $asiento = \App\Seat::find($request->id_asiento);
        $pasajero = new \App\passenger;
        $pasajero->nombre = $request->get('nombre');
        $pasajero->apellido = $request->get('apellido');
        $pasajero->edad = $request->get('edad');
        $pasajero->doc_identidad = $request->get('doc_identidad');
        $pasajero->save();
        return $pasajero;
    }

    public function quitarDelCarrito(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $paquete = \App\package::find($request->id_paquete); 
        $paquete->reservation_id = null;
        $paquete->disponible = true;
        $paquete->save();
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }

    public function verDetalle(Request $request){
        $package = \App\package::find($request->id_paquete);
        $car = $package->car;
        $flight = $package->flight;
        $room = $package->room;
        return view('packages.detalle',compact('package','car','flight','room'));
    }
        public function verAsientos(Request $request){
        $package = \App\package::find($request->id_paquete);
        
        $vuelo = $package->flight;
        $asientos = $vuelo->seat;
        return view('packages.seats',compact('asientos','package'));
    }
    public function verHoteles(Request $request){
        $package = \App\package::find($request->id_paquete);
        $vuelo = $package->flight;
        $destino = $vuelo->destiny;
        $habitaciones = $destino->hotel;
        return $habitaciones;
    }

    public function gotoForm(Request $request){

        $package = \App\package::find($request->id_paquete);
        $asiento = \App\Seat::find($request->id_asiento);
        return view('packages.pasajero',compact('package','asiento'));
    }
    public function agregarAsiento(Request $request){
        $package = \App\package::find($request->id_paquete);
        $asiento = \App\Seat::find($request->id_asiento);
        $pasajero = self::inscribirPasajero($request);
        $asiento->package_id = $package->id;
        $asiento->passenger_id = $pasajero->id;
        $vuelo = $package->flight;
        $asiento->disponibilidad = false;
        $asiento->save();
        $asientos = $vuelo->seat;
        $habitaciones = $vuelo->destiny->room;
        return view('packages.seats',compact('package','asientos'));
        
    }
    
}
