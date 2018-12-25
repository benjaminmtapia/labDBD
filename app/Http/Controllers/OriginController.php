<?php

namespace App\Http\Controllers;

use App\origin;
use Illuminate\Http\Request;
use Validator;

class OriginController extends Controller
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
        return origin::all();
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
        $origin = new \App\Origin;
       $origin->ciudad = $request->get('ciudad');
       return $origin;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function show(origin $origin)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function edit(origin $origin)
    {
        return view('origin.createForm')->with('origin',$origin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, origin $origin)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $origin = new \App\Origin;
       $origin->ciudad = $request->get('ciudad');
       $origin->save();
       return $origin;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function destroy(origin $origin)
    {
        $origin->delete();
        return response()->json(['success']);
    }
}
