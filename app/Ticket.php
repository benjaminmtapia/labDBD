<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ticket extends Model
{
	use SoftDeletes;
	public function reservation(){
	return $this->belongsTo(reservation::class);

	}
	public function seat(){
		return $this->belongsTo(Seat::class);
	}
	
}
