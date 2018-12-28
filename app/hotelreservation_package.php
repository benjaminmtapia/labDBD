<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotelreservation_package extends Model
{
    public function hotelreservation(){
    	return $this->belongsTo(hotel_reservation::class);
    }
    public function package(){
    	return $this->belongsTo(package::class);
    }
}
