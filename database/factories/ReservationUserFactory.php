<?php

use Faker\Generator as Faker;

$factory->define(App\ReservationUser::class, function (Faker $faker) {
	$reserva = DB::table('reservations')->select('id')->get();
	$usuario = DB::table('users')->select('id')->get();
    return [
        'reservation_id'=>$reserva->random()->id,
        'user_id'=>$usuario->random()->id
    ];
});
