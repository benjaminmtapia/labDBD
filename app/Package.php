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
    	return $this->hasMany(hotel_reservation::class);
    }
    
    public function reservation(){
    	return $this->hasMany(package_reservation::class);
    }

    public function flight(){
    	return $this->hasMany(flightpackage::class);
    }           
    public function administrator(){
        return $this->belongsTo(administratorpackage::class);
    }
    public function reservationpackage(){
        return $this->hasMany(reservationpackage::class);
    }

}
