<?php

use Faker\Generator as Faker;

$factory->define(App\stop::class, function (Faker $faker) {
	$vuelo = DB::table('flights')->select('id')->get();
    return [
        'nombre'=>$faker->company,
        'flight_id'=>$vuelo->random()->id
    ];
});
