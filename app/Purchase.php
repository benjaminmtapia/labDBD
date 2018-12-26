<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{

	protected $fillable = [
        'num_compra', 'fecha', 'monto'
    ];

    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
}
