<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ticket extends Model
{
	use SoftDeletes;

	protected $table = 'tickets';
	protected $fillable = ['precio'];

	public function seat(){
		return $this->belongsTo(Seat::class);
	}
	
}
