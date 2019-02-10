<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class origin extends Model
{
	use SoftDeletes;
	protected $table = 'origins';
	protected $fillable = ['ciudad'];
     public function airport(){
    	return $this->hasMany(Airport::class);
    }
         public function flight(){
    	return $this->hasMany(Flight::class);
    }
}
