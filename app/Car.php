<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
	protected $table = 'cars';
	protected $fillable = [
        'patente', 'marca', 'modelo', 'capacidad', 'disponible'
    ];

    public function reservation(){
    	return $this->belongsTo(Reservation::class);
    }

    public function package(){
    	return $this->belongsTo(Package::class);
    }

}
