<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hotel extends Model
{
	use SoftDeletes;
	
	protected $table ='hotels';
	protected $fillable = [
        'ciudad', 'nombre', 'clase', 'disponible'
    ];

    public function room(){
    	return $this->hasMany(room::class);
    }
}
