<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    public function room(){
    	return $this->hasMany(room::class);
    }
}
