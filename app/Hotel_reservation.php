<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotel_reservation extends Model
{

	protected $fillable = [
        /*'num_reserva'*/ 'id', 'cantidad_personas'
    ];

    public function reservation(){
    	return $this->hasMany(Reservation::class);
    }

    public function room(){
    	return $this->hasMany(Room::class);
    }
    public function package(){
    	return $this->hasMany(package::class);
    }

}
