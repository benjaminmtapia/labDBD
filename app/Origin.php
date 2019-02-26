<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class origin extends Model
{
	use SoftDeletes;
	protected $table = 'origins';
	protected $fillable = ['ciudad'];

    public function airport(){
    	return $this->hasMany(Airport::class);
    }
    
    public function reservation(){
    	return $this->hasMany(Reservation::class);
    }

	public function flight(){
    	return $this->hasMany(Reservation::class);
    }
}
