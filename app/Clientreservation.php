<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientreservation extends Model
{
    public function client(){
    	return $this->hasMany(client::class);
    }
    public function reservation(){
    	return $this->hasMany(reservation::class);
    }
}
