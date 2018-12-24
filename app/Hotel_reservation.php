<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotel_reservation extends Model
{

	protected $fillable = [
        /*'num_reserva'*/ 'id', 'cantidad_personas'
    ];

    public function reservation(){
    	return $this->belongsTo(Reservation::class);
    }

    public function room(){
    	return $this->belongsTo(Room::class);
    }

}
