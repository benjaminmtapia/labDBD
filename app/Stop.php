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
    	return $this->hasMany(Airport::class);
    }
    public function flight(){
    	return $this->belongsTo(Flight::class);
    }
}
