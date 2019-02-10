<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight_Stop extends Model
{
	use SoftDeletes; 
	
    public function stop(){
    	return $this->belongsTo(stop::class);
    }
    public function flight(){
    	return $this->belongsTo(flight::class);
    }
}
