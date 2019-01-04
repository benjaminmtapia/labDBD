<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stopflight extends Model
{
	
    public function stop(){
    	return $this->belongsTo(stop::class);
    }
    public function flight(){
    	return $this->belongsTo(flight::class);
    }
}
