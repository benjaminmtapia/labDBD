<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reservation(){
        return $this->hasMany(reservation::class);
    }

    public function check_in(){
        return $this->hasOne(check_in::class);
    }

    public function carrito(){
        return $this->hasOne(Carrito::class);
    }

    public function isAdmin(){
        return $this->is_admin;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
           activity('user')
               ->performedOn($user)
               ->causedBy($user)
               ->withProperties([
                    'user_id'    => $user->id,
                    'causante' => $user->name,
                    'email'  => $user->email
                 ])
               ->log('Creacion de cuenta');
        });

        static::deleting(function ($user) {
           activity('user')
               ->performedOn($user)
               ->causedBy(user())
               ->withProperties([
                    'user_id'    => $user->id,
                    'first_name' => $user->name,
                    'email'  => $user->email
                ])
               ->log('Account Deleted');
        });
    }
}
