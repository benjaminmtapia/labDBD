<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservation extends Model
{
    use SoftDeletes;
	protected $table = 'reservations';
    
 	public function origin(){
    	return $this->belongsTo(Origin::class);
    }
 	public function destiny(){
    	return $this->belongsTo(Destiny::class);
    }
    public function hotel_reservation(){
    	return $this->hasMany(hotel_reservation::class);
    }
    public function car(){
    	return $this->hasMany(car::class);
    }
    public function package(){
    	return $this->hasMany(reservationpackage::class);
    }
    public function administrator(){
    	return $this->hasMany(reservation_administrator::class);
    }
    public function purchase(){
    	return $this->belongsTo(purchase::class);
    }
    public function ticket(){
    	return $this->hasMany(ticket::class);
    }
    public function seat(){
    	return $this->hasMany(Seat::class);

    }
    public function user(){
    	return $this->hasMany(ReservationUser::class);
    }

}
