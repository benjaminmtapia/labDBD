<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stopflight extends Model
{
    public function stop(){
    	return $this->hasMany(stop::class);
    }
    public function flight(){
    	return $this->hasMany(flight::class);
    }
}
