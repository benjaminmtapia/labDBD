<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hotel_reservation extends Model
{
    use SoftDeletes;

	protected $fillable = [
        'cantidad_personas'
    ];

    public function reservation(){
    	return $this->hasMany(Reservation::class);
    }

    public function room(){
    	return $this->hasMany(Room::class);
    }
    public function package(){
    	return $this->hasMany(package::class);
    }

}
