<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrator_package extends Model
{
		
	public function package(){
    	return $this->belongsTo(package::class);
    }
    public function administrator(){
    	return $this->belongsTo(administrator::class);
    }
}
