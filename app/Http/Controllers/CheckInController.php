<?php

namespace App\Http\Controllers;

use App\check_in;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CheckInController extends Controller
{
    public function rules(){
        return[
            'apellidoP' => 'required|string'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return check_in::all();
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
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $check_in = new \App\check_in;
        $check_in->apellidoP = $request->get('apellidoP');
        $check_in->save();
        return $check_in;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $check_in = CheckIn::find($id);
        return $check_in; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function edit(check_in $check_in)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, check_in $check_in)
    {
        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $check_in->apellidoP = $request->get('apellidoP');
        $check_in->save();
        return $check_in;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function destroy(check_in $check_in)
    {
        $check_in->delete();
        return response()->json(['success']);
    }
}
