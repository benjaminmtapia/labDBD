<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class destiny extends Model
{
	protected $table = 'destinies';
	protected $fillable = ['ciudad'];
     public function airport(){
    	return $this->hasMany(Airport::class);
    }
    public function reserva(){
    	return $this->hasMany(Reservation::class);
    }
}
