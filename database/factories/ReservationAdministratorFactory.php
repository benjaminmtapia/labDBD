<?php

use Faker\Generator as Faker;

$factory->define(App\reservation_administrator::class, function (Faker $faker) {
	$reservation = DB::table('reservations')->select('id')->get();
	$administrator = DB::table('administrators')->select('id')->get();
    return [
        'reservation_id' =>$reservation->random()->id,
        'administrator_id' =>$administrator->random()->id
    ];
});
