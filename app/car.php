<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{

	protected $fillable = [
        'patente', 'marca', 'modelo', 'capacidad'
    ];

    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }

    public function package(){
    	return $this->belongsTo(package::class);
    }

}
