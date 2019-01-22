<?php

use Faker\Generator as Faker;

$factory->define(App\flight::class, function (Faker $faker) {
   $origen = DB::table('origins')->select('id')->get();
	$destino = DB::table('destinies')->select('id')->get();
    return [
        'fecha_ida' => $faker->dateTimeThisMonth($max = 'now'),
        'capacidad' => $faker->numberBetween($min = 379, $max = 379),
        'num_pasajeros' => $faker->numberBetween($min = 144, $max = 379),
        'precio' => $faker->numberBetween($min = 100, $max =800),
        'origin_id'=>$origen->random()->id,
        'destiny_id'=>$destino->random()->id          
    ];
});
