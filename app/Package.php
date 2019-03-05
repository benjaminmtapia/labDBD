<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class package extends Model
{
    use SoftDeletes;
    
	protected $fillable = [
        'precio', 'reservation_id'
    ];

    public function flight(){
        return $this->hasOne(flight::class);
    }

    public function car(){
    	return $this->hasOne(car::class);
    }

     public function room(){
    	return $this->hasOne(room::class);
    }
    
    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }

    public function seat(){
        $vuelos = $this->flight;
        $asientos = $vuelos->seat;
    	return $this->hasMany(Seat::class)->take($max = 4);
    }  

}
