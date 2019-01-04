<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservation_administrator extends Model
{
	use SoftDeletes; 
	
     public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
    public function administrator(){
    	return $this->belongsTo(administrator::class);
    }
}
