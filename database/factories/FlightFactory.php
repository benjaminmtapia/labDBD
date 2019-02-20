<?php

use Faker\Generator as Faker;

$factory->define(App\Flight::class, function (Faker $faker) {
   $origen = DB::table('origins')->select('id')->get();
	$destino = DB::table('destinies')->select('id')->get();
    $package = DB::table('packages')->select('id')->get();
    return [
        'fecha_ida' => $faker->dateTimeThisMonth($max = 'now'),
        'fecha_vuelta' => $faker->dateTimeThisYear(),
        'precio' => $faker->numberBetween($min = 100, $max =800),
        'origin_id'=>$origen->random()->id,
        'destiny_id'=>$destino->random()->id
    ];
});
