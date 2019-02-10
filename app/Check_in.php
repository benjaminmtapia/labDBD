<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class check_in extends Model
{
	use SoftDeletes;
	protected $fillable = [
       'apellido'
    ];

    public function reservation(){
    	return $this->belongsTo(Reservation::class);
    }

		public function user(){
    	return $this->belongsTo(User::class);
    }

		public function flight(){
    	return $this->belongsTo(Flight::class);
    }

}
