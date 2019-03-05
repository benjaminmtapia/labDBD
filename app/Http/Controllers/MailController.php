<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;
use Auth;

class MailController extends Controller
{
	public function home(){
        return view('mail');
    }

    public function sendMail(Request $request)
    {
    	$this->validate($request, [
    		"email" => "required", 
    		"subject" => "required",  
    	]);

        $user = Auth::user();
        $email = $user->email;
        $subject = "Confirmación de reserva en Aerolínea DIINF++";

        Mail::to($email)->send(new SendEmail($subject));

    }


}
