<?php

namespace App\Http\Controllers;

use App\administrator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return administrator::all();
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
        $validator = Validator::make($request->all());
        $administrador = new administrator();
        $administrador->nombre = $request->get('nombre');
        $administrador->apellido = $request->get('apellido');
        $administrador->save();
        return $administrador;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(administrator $administrator)
    {
        return $administrator;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(administrator $administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, administrator $administrator)
    {
        $validator = Validator::make($request->all());
        $administrator->nombre = $request->get('nombre');
        $administrator->apellido = $request->get('apellido');
        $administrator->save();
        return $administrator;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(administrator $administrator)
    {
        $administrator->delete();
        return response()->json(['success']);
    }
}
