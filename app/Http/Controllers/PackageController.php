<?php

namespace App\Http\Controllers;

use App\package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\car;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\packagecar;
use App\packagehotel;
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
        $paqueteAuto = packagecar::all();
        $paqueteHotel = packagehotel::all();
        //$autos = car::where('package_id',$paquetes->id);
        return view('packages.principal',compact('paqueteAuto','paqueteHotel'));

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

    public function reservarPaqueteHotel(Request $request){
        $paquete = \App\packagehotel::find($request->id_paquete);

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
        //return view('cart',compact('reserva'));
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }
    public function reservarPaqueteAuto(Request $request){
        $paquete = \App\packagecar::find($request->id_paquete);
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
        //return view('cart',compact('reserva'));
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }
    public function inscribirPasajero(Request $request){
        $asiento = \App\Seat::find($request->id_asiento);
        $pasajero = new \App\passenger;
        $pasajero->nombre = $request->get('nombre');
        $pasajero->apellido = $request->get('apellido');
        $pasajero->edad = $request->get('edad');
        $pasajero->save();
        return $pasajero;
    }

    public function quitarDelCarrito(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $paquete = \App\package::find($request->id_paquete); 
        $paquete->reservation_id = null;
        $paquete->disponible = true;
        $paquete->dias = 0;
        $paquete->dbplus_savepos(relation)();
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }

    public function verDetalleAuto(Request $request){
        $package = \App\packagecar::find($request->id_paquete);
        $car = $package->car;
        $flight = $package->flight;
        return view('packages.detalleauto',compact('package','flight','car'));
    }
        public function verDetalleHotel(Request $request){
        $package = \App\packagehotel::find($request->id_paquete);

        $flight = $package->flight;
        $room = $package->room;

        return view('packages.detallehotel',compact('package','flight','room'));
    }
        public function verAsientoAuto(Request $request){
        $package = \App\packagecar::find($request->id_paquete);
        
        $vuelo = $package->flight;
        $asientos = $vuelo->seat;
        return view('packages.seatsauto',compact('asientos','package'));
    }
    public function verAsientoHotel(Request $request){
        $package = \App\packagehotel::find($request->id_paquete);
        
        $vuelo = $package->flight;
        $asientos = $vuelo->seat;
        return view('packages.seats',compact('asientos','package'));
    }

    public function verHoteles(Request $request){
        $destino  = \App\destiny::find($request->id_destino);
        $package = \App\package::find($request->id_paquete);
        
        $hoteles = $destino->hotel;
       
        return view('packages.hotels',compact('hoteles','package'));
    }

    public function gotoFormAuto(Request $request){

        $package = \App\packagecar::find($request->id_paquete);
        $asiento = \App\Seat::find($request->id_asiento);
        return view('packages.pasajero',compact('package','asiento'));
    }
        public function gotoFormHotel(Request $request){

        $package = \App\packagehotel::find($request->id_paquete);
        $asiento = \App\Seat::find($request->id_asiento);
        return view('packages.pasajero',compact('package','asiento'));
    }
    public function agregarAsiento(Request $request){
        $package = \App\packagehotel::find($request->id_paquete);
        $asiento = \App\Seat::find($request->id_asiento);   
        $pasajero = self::inscribirPasajero($request);
        $asiento->packagehotel_id = $package->id;
        $asiento->passenger_id = $pasajero->id;
        $vuelo = $package->flight;
        $asiento->disponibilidad = false;
        $asiento->save();
        $package->save();
        $asientos = $vuelo->seat;
        $habitaciones = $vuelo->destiny->room;
        return view('packages.seats',compact('package','asientos'));
        
    }
        public function agregarAsientoAuto(Request $request){
        $package = \App\packagecar::find($request->id_paquete);
        $asiento = \App\Seat::find($request->id_asiento);   
        $pasajero = self::inscribirPasajero($request);
        $asiento->packagecar_id = $package->id;
        $asiento->passenger_id = $pasajero->id;
        $vuelo = $package->flight;
        $asiento->disponibilidad = false;
        $asiento->save();
        $package->save();
        $asientos = $vuelo->seat;
        $habitaciones = $vuelo->destiny->room;
        return view('packages.seatsauto',compact('package','asientos'));
        
    }

    public function verHabitaciones(Request $request){
        $hotel = \App\hotel::find($request->id_hotel);
        $habitaciones = $hotel->room;
        $package = \App\package::find($request->id_paquete);
        return view('packages.rooms',compact('package','habitaciones','hotel'));
    }

    public function reservarHabitacion(Request $request){
        $package = \App\package::find($request->id_paquete);
        $habitacion = \App\room::find($request->id_habitacion);
        $habitacion->package_id = $package->id;
        $habitacion->disponible = false;
        $habitacion->save();
        $package->save();
        return $habitacion;
    }
    
}
