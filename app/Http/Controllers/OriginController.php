<?php

namespace App\Http\Controllers;

use App\origin;
use Illuminate\Http\Request;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $origen = origin::all();
        return;
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
        $origen = new origin;
       $origen->ciudad = $request->ciudad;
       return origen;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function show(origin $origin)
    {
        $origin: origin::findOrFail($id);
    return $origin;
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
        $origin->fill($request->all());
        $origin->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function destroy(origin $origin)
    {
        $origen = origin::find($id);
        $origen->delete();
        return 0;
    }
}
