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
    	return $this->belongsTo(seat::class);
    }

	public function secure(){
    	return $this->hasOne(Secure::class);
    }
}
