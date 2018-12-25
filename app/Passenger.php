<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class passenger extends Model
{
	protected $table = 'passengers';
	protected $fillable = ['nombre','apellido','num_asiento','num_vuelo'];
	
    public function flight(){
    	return $this->belongsTo(flight::class);
    }
}
