<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class socio extends Model
{
	use SoftDeletes;
	protected $table = 'socios';
	protected $fillable = ['email','millas'];
    
    public function user(){
    	return $this->belongsTo(user::class);
    }
}
