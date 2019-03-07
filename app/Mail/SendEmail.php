<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\reservation;
use App\car;
use App\Seat;
use App\room;
use App\Secure;
use Auth;
use Carbon\Carbon;
use \App\User;
use \App\Carrito;
use App\package;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sub;
    public $reservation;
    public $seats;
    public $cars;
    public $rooms;
    public $secures;
    public $packages;

    public function __construct($subject, $user_id)
    {
        $user = \App\User::find($user_id);
        $email = $user->email;
        $subject = "Confirmación de reserva en Aerolínea DIINF++";
        $reservation = $user->reservation->last();
        $carrito = $user->carrito;
        $id_res = $reservation->id; 
        $seats = Seat::all()->where('reservation_id', $id_res);
        $cars = car::all()->where('reservation_id', $id_res);
        $rooms = room::all()->where('reservation_id', $id_res);
        $secures = Secure::all()->where('reservation_id', $id_res);
        $packages = package::all()->where('reservation_id', $id_res);
        $reservation->disponibilidad = false;
        $reservation->save();
        $carrito->disponibilidad = false;
        $carrito->save();
        $this->sub = $subject;
        $this->reservation = $reservation;
        $this->seats = $seats;
        $this->cars = $cars;
        $this->rooms = $rooms;
        $this->secures = $secures;
        $this->packages = $packages;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->sub;
        $e_reservation = $this->reservation;
        $e_seats = $this->seats;
        $e_cars = $this->cars;
        $e_rooms = $this->rooms;
        $e_secures = $this->secures;
        $e_packages = $this->packages;
        return $this->view('sendmail', compact('e_reservation', 'e_seats', 'e_cars', 'e_rooms', 'e_secures', 'e_packages'))->subject($e_subject);
    }
}
