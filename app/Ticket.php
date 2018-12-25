<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
	public function reservation(){
	return $this->belongsTo(reservation::class);

	}
	public function flight(){
		return $this->belongsTo(flight::class);
	}
	
}
