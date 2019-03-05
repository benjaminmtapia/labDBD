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

    public function __construct($subject)
    {
        $user = Auth::user();
        $email = $user->email;
        $subject = "Confirmación de reserva en Aerolínea DIINF++";
        $reservation = $user->reservation->last();
        $id_res = $reservation->id; 
        $seats = Seat::all()->where('reservation_id', $id_res);
        $cars = car::all()->where('reservation_id', $id_res);
        $rooms = room::all()->where('reservation_id', $id_res);
        $secures = Secure::all()->where('reservation_id', $id_res);
        $this->sub = $subject;
        $this->reservation = $reservation;
        $this->seats = $seats;
        $this->cars = $cars;
        $this->rooms = $rooms;
        $this->secures = $secures;
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
        return $this->view('sendmail', compact('e_reservation', 'e_seats', 'e_cars', 'e_rooms', 'e_secures'))->subject($e_subject);
    }
}
