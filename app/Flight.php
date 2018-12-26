<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class flight extends Model
{
    public function reservation(){
    	return $this->belongsToMany(Reservation::class);
    }
    public function ticket(){
    	return $this->hasMany(ticket::class);

    }
    public function stop(){
    	return $this->belongsToMany(stop::class);
    }
    public function passenger(){
    	return $this->hasMany(passenger::class);
    }
    public function package(){
    	return $this->belongsToMany(package::class);
    }
}
