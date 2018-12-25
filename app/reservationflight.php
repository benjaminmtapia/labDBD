<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservationflight extends Model
{
    public function reservation(){
    	return $this->hasMany(reservation::class);
    }
    public function flight(){
    	return $this->hasMany(flight::class);
    }
}
