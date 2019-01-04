<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservationflight extends Model
{
	use SoftDeletes; 
	
    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
    public function flight(){
    	return $this->belongsTo(flight::class);
    }
}
