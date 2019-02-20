<?php

use Faker\Generator as Faker;

$factory->define(App\check_in::class, function (Faker $faker) {
	$reserva = DB::table('reservations')->select('id')->get();
	$vuelo = DB::table('flights')->select('id')->get();
    return [
		'reservation_id'=>$reserva->random()->id,
        'flight_id'=>$vuelo->random()->id,
        'apellidoP'=>$faker->lastName
    ];
});
