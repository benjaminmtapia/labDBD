<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class car extends Model
{
    use SoftDeletes;

	protected $table = 'cars';
	protected $fillable = [
        'patente', 'marca', 'modelo', 'capacidad'
    ];

    public function reservation(){
    	return $this->belongsTo(Reservation::class);
    }

    public function package(){
    	return $this->belongsTo(Package::class);
    }

}
