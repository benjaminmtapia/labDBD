<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class flightpackage extends Model
{
	use SoftDeletes; 
	
    public function flight(){
    	return $this->belongsTo(flight::class);
    }
    public function package(){
    	return $this->belongsTo(package::class);
    }
}
