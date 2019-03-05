<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservation extends Model
{
    use SoftDeletes;
	protected $table = 'reservations';
  
    public function car(){
    	return $this->hasMany(car::class);
    }

    public function package(){
    	return $this->hasMany(package::class);
    }

    public function ticket(){
    	return $this->hasMany(ticket::class);
    }

    public function seat(){
    	return $this->hasMany(Seat::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function room(){
        return $this->hasMany(room::class);
    }

    public function secure(){
        return $this->hasMany(Secure::class);
    }    
    public function checkin(){
        return $this->hasOne(check_in::class);
    }

}
