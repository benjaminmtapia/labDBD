<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function room(){
    	return $this->hasMany(Room::class);
    }
 	public function reservation(){
    	return $this->belongsTo(Reservation::class);
    }
}
