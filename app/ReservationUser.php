<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservationUser extends Model
{
	use SoftDeletes; 
	
    public function reservation(){
    	return $this->belongsTo(Reservation::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
