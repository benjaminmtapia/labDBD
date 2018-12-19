<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class origin extends Model
{
     public function airport(){
    	return $this->belongsTo(airport::class);
    }
         public function reserva(){
    	return $this->hasMany(reserva::class);
    }
}
