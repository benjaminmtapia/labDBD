<?php

use Faker\Generator as Faker;

$factory->define(App\reservationflight::class, function (Faker $faker) {
	$reservation = DB::table('reservations')->select('id')->get();
	$flight = DB::table('flights')->select('id')->get();
    return [
        'reservation_id'=>$reservation->random()->id,
        'flight_id'=>$flight->random()->id
    ];
});
