<?php

namespace App\Http\Controllers;

use App\Secure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;

class SecureController extends Controller
{

    public function rules(){
        return[
            'tipo'=>'required|string',
            'passenger_id'=>'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secures = Secure::all();

        return view('secures.principal', compact('secures'));
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
        $secure = new \App\Secure;
        $secure->tipo = $request->get('tipo');
        $secure->reservation_id = $request->get('reservation_id');
        $secure->passenger_id = $request->get('passenger_id');
        return $secure;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Secure  $secure
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $secure = Secure::find($id);
        return $secure;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Secure  $secure
     * @return \Illuminate\Http\Response
     */
    public function edit(Secure $secure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Secure  $secure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Secure $secure)
    {
       $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $secure->tipo = $request->get('tipo');
        $secure->reservation_id = $request->get('reservation_id');
        $secure->passenger_id = $request->get('passenger_id');
        return $secure;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Secure  $secure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secure $secure)
    {
        $secure->delete();//TE ODIO >:(
        return Response()->json(['success']);
    }

    public function reservarSeguro(Request $request)
    {
      $seguro = \App\Secure::find($request->id_seguro);
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
         $reserva->precio = $reserva->precio + $seguro->precio;
         $reserva->user_id = $user->id;
         $reserva->fecha_reserva = Carbon::now();
         $reserva->disponibilidad= true;
         $reserva->save();
      }
      else{
         $booleano = \App\reservation::all()->last()->disponibilidad;
         if($booleano==false){
             $reserva = new \App\reservation;
             $reserva->cod_reserva = Str::random(16);
             $reserva->precio = $reserva->precio + $seguro->precio;
             $reserva->user_id = $user->id;
             $reserva->fecha_reserva = Carbon::now();
             $reserva->save();
         }
         else{
             $reserva = \App\reservation::all()->last();
             $reserva->precio = $reserva->precio + $seguro->precio;
             $reserva->save();
         }
      }
      $seguro->reservation_id = $reserva->id;
      $seguro->save();
     //return view('carrito',compact('reserva','request'));
      return redirect()->action('CarritoController@show',['id' => $user->id]);
    }

    public function quitarDelCarrito(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $seguro = \App\Secure::find($request->id_seguro); 
        $seguro->reservation_id = null;
        $seguro->save();
        return redirect()->action('CarritoController@show',['id' => $user->id]);
    }

    public function gotoForm(Request $request){
        $seguro = \App\Secure::find($request->id_seguro);
        return view('secures.pasajero',compact('seguro'));
    }
}
