<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{

	protected $fillable = [
        'num_compra', 'fecha', 'monto'
    ];

    public function purchase(){
    	return $this->belongsTo(purchase::class);
    }
}
