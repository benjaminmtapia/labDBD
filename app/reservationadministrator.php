<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservationadministrator extends Model
{
    public function reservation(){
    	return $this->hasMany(reservation::class);
    }
    public function administrator(){
    	return $this->hasMany(administrator::class);
    }
}
