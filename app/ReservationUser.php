<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationUser extends Model
{
	 
	
    public function reservation(){
    	return $this->belongsTo(Reservation::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
