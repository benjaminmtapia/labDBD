<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class destiny extends Model
{
	use SoftDeletes;
	protected $table = 'destinies';
	protected $fillable = ['ciudad'];
     public function airport(){
    	return $this->hasMany(Airport::class);
    }
    public function reserva(){
    	return $this->hasMany(Reservation::class);
    }
}
