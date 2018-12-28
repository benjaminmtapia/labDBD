<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrator extends Model
{
    public function reservation(){
    	return $this->hasMany(administratorreservation::class);

    }
    public function package(){
    	return $this->hasMany(administratorpackage::class);

    }
}
