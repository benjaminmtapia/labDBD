<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class airport extends Model
{
	protected $fillable = ['ciudad','nombre'];
 	public function origin(){
    	return $this->belongsTo(Origin::class);
    }
 	public function destiny(){
    	return $this->belongsTo(Destiny::class);
    }
}
