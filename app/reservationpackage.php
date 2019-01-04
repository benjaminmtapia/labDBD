<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservationpackage extends Model
{
	
	public function package(){
    	return $this->belongsTo(package::class);
    }
    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
}
