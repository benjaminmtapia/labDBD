<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class check_in extends Model
{
	use SoftDeletes;
	protected $fillable = [
       'cuenta', 'numero_vuelo'
    ];
    
    public function reservation(){
    	return $this->belongsTo(reservation::class);
    }
    public function passenger(){
    	return $this->belongsTo(passenger::class);
    }
}
