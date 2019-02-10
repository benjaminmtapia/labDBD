<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airplane extends Model
{
	use SoftDeletes;
	protected $table = 'airplanes';
	protected $fillable = ['capacidad'];

 	public function flight(){
    	return $this->belongsTo(flight::class);
    }
}