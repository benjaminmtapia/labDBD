<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class check_in extends Model
{

	protected $fillable = [
       /* 'cod_reserva', */'cuenta', 'numero_vuelo'
    ];
    
    public function reservation(){
    	return $this->hasOne(reservation::class);
    }

}
