<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Secure extends Model
{
    use SoftDeletes;

	protected $table ='secures';
	protected $fillable = [
        'tipo', 'passenger_id'
    ];

    public function passenger(){
    	return $this->belongsTo(passenger::class);
    }

	public function reservation(){
    	return $this->belongsTo(reservation::class);
    }

}
