<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class airport extends Model
{
	protected $table = 'airports';
	protected $fillable = ['ciudad','nombre'];
 	public function origin(){
    	return $this->belongsTo(origin::class);
    }
 	public function destiny(){
    	return $this->belongsTo(destiny::class);
    }
    public function stops(){
    	return $this->belongsTo(stop::class);
    }
}
