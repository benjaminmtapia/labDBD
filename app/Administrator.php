<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrator extends Model
{
    public function reservation(){
    	return $this->belongsToMany(Reservation::class);

    }
    public function package(){
    	return $this->belongsToMany(Package::class);

    }
}
