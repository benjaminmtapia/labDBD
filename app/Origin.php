<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class origin extends Model
{
	protected $table = 'origins';
	protected $fillable = ['ciudad'];
     public function airport(){
    	return $this->hasMany(Airport::class);
    }
         public function reserva(){
    	return $this->hasMany(Reserva::class);
    }
}
