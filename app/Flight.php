<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class flight extends Model
{
    use SoftDeletes;
    public function stop(){
    	return $this->hasMany(stopflight::class);
    }
    public function seat(){
    	return $this->hasMany(Seat::class);
    }
    public function check_in(){
    	return $this->hasMany(check_in::class);
    }
    public function origin(){
        return $this->belongsTo(Origin::class);
    }
    public function destiny(){
        return $this->belongsTo(Destiny::class);
    }
    public function plane(){
        return $this->hasMany(plane::class);
    }
}
