<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class flight extends Model
{
    use SoftDeletes;
    public function reservation(){
    	return $this->hasMany(reservationflight::class);
    }
    
    public function ticket(){
    	return $this->hasMany(ticket::class);

    }
    public function stop(){
    	return $this->hasMany(stopflight::class);
    }
    public function seat(){
    	return $this->hasMany(Seat::class);
    }
    public function package(){
    	return $this->belongsTo(package::class);
    }
    public function origin(){
        return $this->belongsTo(Origin::class);
    }
    public function destiny(){
        return $this->belongsTo(Destiny::class);
    }
}
