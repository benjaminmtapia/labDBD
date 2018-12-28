<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientreservation extends Model
{
    public function client(){
    	return $this->belongsTo(client::class);
    }
    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
}
