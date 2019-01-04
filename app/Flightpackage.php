<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class flightpackage extends Model
{	
    public function flight(){
    	return $this->belongsTo(flight::class);
    }
    public function package(){
    	return $this->belongsTo(package::class);
    }
}
