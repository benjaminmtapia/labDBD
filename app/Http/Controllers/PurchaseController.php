<?php

namespace App\Http\Controllers;

use App\purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
class PurchaseController extends Controller
{

   public function rules(){
        return[
            'fecha' => 'required|date'
        ];
    }   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return purchase::all();
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
        $purchase = new \App\purchase; 
        $purchase->fecha = Carbon::now();
        $purchase->precio = $request->get('precio'); 
        $purchase->tipo_tarjeta = $request->get('tipo_tarjeta'); 
        $purchase->numero_tajeta = $request->get('numero_tajeta'); 
        $purchase->nombre_titular = $request->get('nombre_titular'); 
        $purchase->apellido_titular = $request->get('apellido_titular'); 
        $purchase->reservation_id = $request->get('reservation_id'); 
        $purchase->save();
        $reservation = \App\reservation::find($request->reservation_id);
    //    return view('compra', compact('purchase', 'reservation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::find($id);
        return $purchase; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchase $purchase)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }   
        $purchase->fecha = $request->get('fecha');
        $purchase->save();
        return $purchase; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchase $purchase)
    {
        $purchase->delete();
        return response()->json(['success']);
    }
}
