<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class reservationflight extends Model
{
	
	
    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
    public function flight(){
    	return $this->belongsTo(flight::class);
    }
}
