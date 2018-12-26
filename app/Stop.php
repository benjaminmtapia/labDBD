<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stop extends Model
{
	protected $table = 'stops';
	protected $fillable = ['nombre'];
	
    public function airport(){
    	return $this->belongsTo(airport::class);
    }
    public function flight(){
    	return $this->belongsToMany(flight::class);
    }
}
