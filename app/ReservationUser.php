<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationUser extends Model
{
    public function reservation(){
    	$this->hasMany(Reservation::class);
    }
    public function user(){
    	$this->hasMany(User::class);
    }
}
