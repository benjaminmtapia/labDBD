<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{

	protected $fillable = [
        'descuento', 'fecha_vencimiento'
    ];

    public function car(){
    	return $this->hasMany(car::class);
    }

     public function hotel_reservation(){
    	return $this->belongsToMany(hotel_reservation::class);
    }
    
    public function reservation(){
    	return $this->belongsToMany(reservation::class);
    }

    public function flight(){
    	return $this->belongsToMany(flight::class);
    }           
    public function administrator(){
        return $this->belongsToMany(administrator::class);
    }

}
