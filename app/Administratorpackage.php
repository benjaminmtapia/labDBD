<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administratorpackage extends Model
{
    public function package(){
    	return $this->hasMany(package::class);
    }
    public function administrator(){
    	return $this->hasMany(administrator::class);
    }
}
