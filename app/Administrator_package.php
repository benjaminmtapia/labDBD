<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class administrator_package extends Model
{
	use SoftDeletes; 
	
	public function package(){
    	return $this->belongsTo(package::class);
    }
    public function administrator(){
    	return $this->belongsTo(administrator::class);
    }
}
