<?php

use Faker\Generator as Faker;

$factory->define(App\ticket::class, function (Faker $faker) {
	$asiento = DB::table('seats')->select('id')->get();
    return [
        'seat_id' => $asiento->random()->id,
        'precio'=>$faker->numberBetween($min = 150, $max = 4000)
    ];
});
