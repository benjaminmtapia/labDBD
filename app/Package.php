<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class package extends Model
{
    use SoftDeletes;
    
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
    	return $this->belongsTo(reservation::class);
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
