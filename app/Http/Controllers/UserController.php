<?php

namespace App\Http\Controllers;
use \App\User;
use Illuminate\Http\Request;
use Validator;
use Spatie\Activitylog\Models\Activity;
use Auth;

class UserController extends Controller
{
    public function rules(){
        return[
            'name' => 'required|string',
            'email' => 'required|string',
            'password'=>'required|string'
        ];
    }
    public function index()
    {
        $user = User::all();
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $airport = new \App\User;
        $airport->name = $request->get('name');
        $airport->email = $request->get('email');
        $airport->password = $request->get('password');
        $airport->save();
        return $airport;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function edit(airport $airport)
    {
        //return view('airport.createForm')->with('aiport',$airport);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $validator = Validator::make($request->all(),$this->rules());
        if($validator->fails()){
            return $validator->messages();
        }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        $user->save();
        return $user;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success']);
    }

    public function mostrarHistorial()
    {
      $user = Auth::user();
      if ($user->is_admin) {
        $actividades = Activity::orderBy('created_at', 'DESC')->paginate(50);
      }
      else {
        $actividades = Activity::where('causer_id', $user->id)->orderBy('created_at', 'DESC')->paginate(50);
      }
      return view('historial', compact('actividades'));
    }

    public function admin()
    {
      $user = Auth::user();
      if ($user->is_admin) {
        return view('admin');
      }
    }
}
