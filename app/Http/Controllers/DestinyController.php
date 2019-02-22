<?php

namespace App\Http\Controllers;

use App\Destiny;
use Illuminate\Http\Request;
use Validator;
class DestinyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rules(){
       return[
        'ciudad'=>'required|string'
       ];
    }
    public function index()
    {
        $destino =  Destiny::all();
        return view('hotels.principal',compact('destino'));

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
        $destiny = new \App\destiny;
        $destiny->ciudad = $request->get('ciudad');
        $destiny->save();
        return $destiny;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function show(Destiny $destiny)
    {
    return $destiny;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function edit(Destiny $destiny)
    {
         return view('destiny.createForm')->with('destiny',$destiny);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destiny $destiny)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $destiny->ciudad = $request->get('ciudad');
        $destiny->save();
        return $destiny;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destiny  $destiny
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destiny $destiny)
    {
        $destiny->delete();
        return response()->json(['success']);
    }
}
