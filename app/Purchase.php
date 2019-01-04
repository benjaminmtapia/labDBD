<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class purchase extends Model
{

	use SoftDeletes;
	protected $fillable = [
        'num_compra', 'fecha', 'monto'
    ];

    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
}
