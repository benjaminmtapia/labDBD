<?php

use Faker\Generator as Faker;

$factory->define(App\check_in::class, function (Faker $faker) {
	$vuelo = DB::table('flights')->select('id')->get();
    return [
        'flight_id'=>$vuelo->random()->id,
        'verificado'=>$faker->boolean
    ];
});
