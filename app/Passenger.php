<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class passenger extends Model
{
	protected $table = 'passengers';
	protected $fillable = ['nombre','apellido',];
	
    public function seat(){
    	return $this->belongsTo(seat::class);
    }
}
