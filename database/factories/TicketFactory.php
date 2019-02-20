<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
	$seat = DB::table('seats')->select('id')->get();
    return [
        'seat_id' => $seat->random()->id,
        'precio'=> $faker->numberBetween($min = 150, $max = 4000)
    ];
});
