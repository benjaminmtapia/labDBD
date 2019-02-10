<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class airport extends Model
{
	use SoftDeletes;
	protected $table = 'airports';
	protected $fillable = ['nombre'];

 	public function origin(){
    	return $this->belongsTo(origin::class);
    }
 	public function destiny(){
    	return $this->belongsTo(destiny::class);
    }
    public function stop(){
    	return $this->belongsTo(stop::class);
    }
}
