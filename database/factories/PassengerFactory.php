<?php

use Faker\Generator as Faker;

$factory->define(App\passenger::class, function (Faker $faker) {
	$vuelo = DB::table('flights')->select('id')->get();
    return [
        'nombre'=>$faker->name,
        'apellido'=>$faker->lastName,
        'num_asiento'=>$faker->numberBetween(1,100),
        'flight_id'=>$vuelo->random()->id
    ];
});
