<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class car extends Model
{
    use SoftDeletes;
    
	protected $table = 'cars';
	protected $fillable = [
        'patente', 'marca', 'modelo', 'capacidad', 'precio'
    ];

    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }

    public function package(){
    	return $this->belongsTo(package::class);
    }
    
    public function destiny(){
        return $this->belongsTo(destiny::class);
    }

}
