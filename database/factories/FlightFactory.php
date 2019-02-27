<?php

use Faker\Generator as Faker;

$factory->define(App\Flight::class, function (Faker $faker) {
    $origen = DB::table('origins')->select('id')->get();
	$destino = DB::table('destinies')->select('id')->get();
    $package = DB::table('packages')->select('id')->get();
    return [
        'fecha_ida' => $faker->dateTimeThisMonth($min = 'now', $max = '+ 1 year'),
        'fecha_vuelta' => $faker->dateTimeThisYear($min = '+ 7 days',$max = '+ 5 months'),
        'precio' => $faker->numberBetween($min = 100, $max =800),
        'origin_id'=>$origen->random()->id,
        'destiny_id'=>$destino->random()->id,
        'package_id'=>$package->random()->id
    ];
});
