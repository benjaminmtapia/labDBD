<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
	use SoftDeletes; 
	
	protected $table = 'seats';
	protected $fillable = ['letra','numero',];
	
    public function flight(){
    	return $this->belongsTo(flight::class);
    }

	public function passenger(){
    	return $this->belongsTo(passenger::class);
    }
}
