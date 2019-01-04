<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hotelreservation_package extends Model
{
	use SoftDeletes;

    public function hotelreservation(){
    	return $this->belongsTo(hotel_reservation::class);
    }
    public function package(){
    	return $this->belongsTo(package::class);
    }
}
