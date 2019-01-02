<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class check_in extends Model
{

	protected $fillable = [
       'cuenta', 'numero_vuelo'
    ];
    
    public function reservation(){
    	return $this->belongsTo(Reservation::class);
    }

}
