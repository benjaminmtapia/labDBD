<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
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
    	return $this->belongsToMany(package::class);
    }
    public function administrator(){
    	return $this->belongsToMany(administrator::class);
    }
    public function purchase(){
    	return $this->belongsTo(purchase::class);
    }
    public function ticket(){
    	return $this->hasMany(ticket::class);
    }
    public function flight(){
    	return $this->belongsToMany(flight::class);

    }
    public function user(){
    	return $this->belongsToMany(User::class);
    }
}
