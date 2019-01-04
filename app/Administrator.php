<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class administrator extends Model
{
	use SoftDeletes;
    public function reservation(){
    	return $this->hasMany(administratorreservation::class);

    }
    public function package(){
    	return $this->hasMany(administratorpackage::class);

    }
}
