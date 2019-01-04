<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hotel extends Model
{
	use SoftDeletes;
	
    public function room(){
    	return $this->hasMany(room::class);
    }
}
