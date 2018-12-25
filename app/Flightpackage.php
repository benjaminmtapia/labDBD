<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class flightpackage extends Model
{
    public function package(){
    	return $this->hasMany(package::class);
    }
    public function flight(){
    	return $this->hasMany(flight::class);
    	
    }
}
