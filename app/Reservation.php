<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
	protected $table = 'reservations';
    
 	public function origin(){
    	return $this->belongsTo(Origin::class);
    }
 	public function destiny(){
    	return $this->belongsTo(Destiny::class);
    }
}
