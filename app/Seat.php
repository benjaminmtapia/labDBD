<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
	protected $table = 'seats';
	protected $fillable = ['letra','numero',];
	
    public function flight(){
    	return $this->belongsTo(flight::class);
    }

	public function passenger(){
    	return $this->belongsTo(passenger::class);
    }
}
