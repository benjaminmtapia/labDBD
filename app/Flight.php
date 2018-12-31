<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class flight extends Model
{
    public function reservation(){
    	return $this->hasMany(reservationflight::class);
    }
    public function ticket(){
    	return $this->hasMany(ticket::class);

    }
    public function stop(){
    	return $this->hasMany(stopflight::class);
    }
    public function passenger(){
    	return $this->hasMany(passenger::class);
    }
    public function package(){
    	return $this->hasMany(flightpackage::class);
    }
}
