<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
	protected $table ='rooms';
	protected $fillable = [
        'numero', 'capacidad'
    ];

    public function hotel(){
    	return $this->belongsTo(Hotel::class);
    }

    public function hotel_reservation(){
    	return $this->hasMany(Hotel_reservation::class);
    }

}
