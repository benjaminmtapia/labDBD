<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class room extends Model
{
    use SoftDeletes;

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
