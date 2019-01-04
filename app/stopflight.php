<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class stopflight extends Model
{
	use SoftDeletes; 
	
    public function stop(){
    	return $this->belongsTo(stop::class);
    }
    public function flight(){
    	return $this->belongsTo(flight::class);
    }
}
