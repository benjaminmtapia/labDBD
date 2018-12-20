<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{

	protected $fillable = [
        'ciudad', 'nombre', 'clase'
    ];

    public function room(){
    	return $this->hasMany(room::class);
    }

}