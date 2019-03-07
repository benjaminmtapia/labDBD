<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packagecar extends Model
{
        public function flight(){
    	return $this->hasOne(flight::class);
    }
    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
    public function car(){
    	return $this->hasOne(car::class);

    }
}
