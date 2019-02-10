<?php

use Faker\Generator as Faker;

$factory->define(App\stop::class, function (Faker $faker) {
	$vuelo = DB::table('flights')->select('id')->get();
    return [
        'nombre'=>$faker->name,
        'flight_id'=>$vuelo->random()->id
    ];
});
