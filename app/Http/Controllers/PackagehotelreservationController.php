<?php

namespace App\Http\Controllers;

use App\packagehotelreservation;
use Illuminate\Http\Request;

class PackagehotelreservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $packagehotelreservation::all();
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
 
        $packagehotelreservation = new \App\packagehotelreservation;
        $packagehotelreservation->descuento = $request->get('descuento');
        $packagehotelreservation->fecha_vencimiento = $request->get('fecha_vencimiento');
        $packagehotelreservation->save();
        return $packagehotelreservation;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\packagehotelreservation  $packagehotelreservation
     * @return \Illuminate\Http\Response
     */
    public function show(packagehotelreservation $packagehotelreservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\packagehotelreservation  $packagehotelreservation
     * @return \Illuminate\Http\Response
     */
    public function edit(packagehotelreservation $packagehotelreservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\packagehotelreservation  $packagehotelreservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, packagehotelreservation $packagehotelreservation)
    {
        $package = new \App\package;
        $package->descuento = $request->get('descuento');
        $package->fecha_vencimiento = $request->get('fecha_vencimiento');
        $package->save();
        return $package;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\packagehotelreservation  $packagehotelreservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(packagehotelreservation $packagehotelreservation)
    {
        $packagehotelreservation->delete();
        return  response()->json(['success']);
    }
}
