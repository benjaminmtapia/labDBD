<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class socio extends Model
{
	protected $table = 'socios';
	protected $fillable = ['email','millas'];
    
    public function user(){
    	return $this->belongsTo(user::class);
    }
}
