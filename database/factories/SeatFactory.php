<?php

use Faker\Generator as Faker;

$factory->define(App\Seat::class, function (Faker $faker) {
	$flight = DB::table('flights')->select('id')->get();
	$reservation = DB::table('reservations')->select('id')->get();
	$passenger = DB::table('passengers')->select('id')->get();
    return [
        'letra'=>$faker->randomLetter(),
        'numero'=>$faker->numberBetween(1,10),
        'disponibilidad'=>$faker->boolean,
        'reservation_id'=>$reservation->random()->id
    ];
});