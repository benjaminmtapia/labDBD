<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{

	protected $fillable = [
        'numero', 'capacidad', 'disponible'
    ];

    public function hotel(){
    	return $this->belongsTo(Hotel::class);
    }

    public function hotel_reservation(){
    	return $this->belongsTo(Hotel_reservation::class);
    }

}
