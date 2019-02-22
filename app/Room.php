<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class room extends Model
{
    use SoftDeletes;

	protected $table ='rooms';
	protected $fillable = [
        'numero', 'capacidad', 'disponible', 'fecha_ida', 'fecha_vuelta'
    ];

    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }

    public function package(){
    	return $this->belongsTo(package::class);
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

}
