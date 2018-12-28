<?php

use Faker\Generator as Faker;

$factory->define(App\userreservation::class, function (Faker $faker) {
	$user = DB::table('users')->select('id')->get();
	$reservation = DB::table('reservations')->select('id')->get();
    return [
        'user_id'=>$user->random()->id,
        'reservation_id'=>$reservation->random()->id
    ];
});
