<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class stop extends Model
{
	use SoftDeletes;
	protected $table = 'stops';
	protected $fillable = ['nombre'];
	
    public function airport(){
    	return $this->belongsTo(airport::class);
    }
    public function flight(){
    	return $this->hasMany(stopflight::class);
    }
}
