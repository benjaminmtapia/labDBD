<?php

namespace App\Http\Controllers;

use App\package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\car;
class PackageController extends Controller
{

    public function rules(){
        return[
            'precio' => 'required|integer',
            'reservation_id' => 'required|integer',
        ];
    }   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paquetes= package::all();

        //$autos = car::where('package_id',$paquetes->id);
        return view('packages.principal',compact('paquetes'));

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
        $package = new \App\package;
        $package->precio = $request->get('precio');
        $package->reservation_id = $request->get('reservation_id');        
        $package->save();
        return $package;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\package  $package
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id);
        return $package; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, package $package)
    {
/*        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return $validator->messages();
        }   */
        $package->precio = $request->get('precio');
        $package->reservation_id = $request->get('reservation_id');        
        $package->save();
        return $package;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(package $package)
    {
        $package->delete();
        return response()->json(['success']);
    }

    public function reservarPaquete($request){
        return $request;
    }
}
