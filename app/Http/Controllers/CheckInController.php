<?php

namespace App\Http\Controllers;

use App\check_in;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check_ins = check_in::all();
        return $check_ins; 

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
        $check_in = new check_in();
        $check_in->cuenta=$request->get('cuenta');
        $check_in->num_vuelo=$request->get('num_vuelo');
        $check_in->save();
        return $check_in;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function show(check_in $check_in)
    {
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
        $validator = Validator::make($request->all());
        $check_in->cuenta=$request->get('cuenta');
        $check_in->num_vuelo=$request->get('num_vuelo');
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
        $check_in->destroy();
        return ;
    }
}
