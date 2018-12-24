<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class destiny extends Model
{
     public function airport(){
    	return $this->hasMany(airport::class);
    }
         public function reserva(){
    	return $this->hasMany(reserva::class);
    }
}
