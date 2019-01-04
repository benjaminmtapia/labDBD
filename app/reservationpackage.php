<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservationpackage extends Model
{
	use SoftDeletes;
	
	public function package(){
    	return $this->belongsTo(package::class);
    }
    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
}
