<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class passenger extends Model
{
	use SoftDeletes; 
	
	protected $table = 'passengers';
	protected $fillable = ['nombre','apellido','edad'];
	
    public function seat(){
    	return $this->hasOne(Seat::class);
    }

	public function secure(){
    	return $this->hasOne(Secure::class);
    }
    public function checkin(){
    	return $this->hasOne(check_in::class);
    }
}
