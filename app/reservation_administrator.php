<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation_administrator extends Model
{
     public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
    public function administrator(){
    	return $this->belongsTo(administrator::class);
    }
}
