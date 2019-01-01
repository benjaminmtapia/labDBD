<?php

namespace App\Http\Controllers;

use App\administrator_package;
use Illuminate\Http\Request;

class AdministratorPackageController extends Controller
{

    public function rules(){
        return[
            'administrator_id' => 'required|integer',
            'package_id' => 'required|integer'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return administrator_package::all();
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
        $administrator_package = new \App\administrator_package;
        $administrator_package->administrator_id = $request->get('administrator_id');
        $administrator_package->package_id = $request->get('package_id');
        $administrator_package->save();
        return $administrator_package;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\administrator_package  $administrator_package
     * @return \Illuminate\Http\Response
     */
    public function show(administrator_package $administrator_package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\administrator_package  $administrator_package
     * @return \Illuminate\Http\Response
     */
    public function edit(administrator_package $administrator_package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\administrator_package  $administrator_package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, administrator_package $administrator_package)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $administrator_package->administrator_id = $request->get('administrator_id');
        $administrator_package->package_id = $request->get('package_id');
        $administrator_package->save();
        return $administrator_package;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\administrator_package  $administrator_package
     * @return \Illuminate\Http\Response
     */
    public function destroy(administrator_package $administrator_package)
    {
        $administrator_package->delete();//TE ODIO >:(
        return Response()->json(['success']);
    }
}
