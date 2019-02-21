<?php

namespace App\Http\Controllers;

use App\ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function rules(){
         return[
             'seat_id' => 'required|integer',
             'precio' => 'required|integer'
         ];
     }
    public function index()
    {
        return ticket::all();
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
        if ($validator->fails()) {
            return $validator->messages();
        }
        $ticket = new \App\ticket;
        $ticket->seat_id = $request->get('seat_id');
        $ticket->precio = $request->get('precio');
        return $ticket;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = ticket::find($id);
        return $ticket; 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ticket $ticket)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
          return $validator->messages();
        }
        $ticket->seat_id = $request->get('seat_id');
        $ticket->precio = $request->get('precio');
        return $ticket;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(ticket $ticket)
    {
        $ticket->delete();
        return response()->json(['success']);
    }
}
