<?php

use Faker\Generator as Faker;

$factory->define(App\Airplane::class, function (Faker $faker) {
	$vuelo = DB::table('flights')->select('id')->get();
    return [
    	'capacidad'=>$faker->numberBetween($min=100, $max=250),
    	'flight_id'=>$vuelo->random()->id
    ];
});
