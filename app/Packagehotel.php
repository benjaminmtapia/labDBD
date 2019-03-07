<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packagehotel extends Model
{
    public function flight(){
    	return $this->hasOne(flight::class);
    }
    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
    public function room(){
    	return $this->hasMany(room::class);

    }

}
