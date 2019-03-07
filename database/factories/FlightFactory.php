<?php

use Faker\Generator as Faker;

$factory->define(App\Flight::class, function (Faker $faker) {
    $origen = DB::table('origins')->select('id')->get();
	$destino = DB::table('destinies')->select('id')->get();
    $packagehotel = DB::table('packagehotels')->select('id')->get();
    $packagecar = DB::table('packagecars')->select('id')->get();
    return [
        'fecha_ida' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 2 weeks'),
        'fecha_vuelta' => $faker->dateTimeBetween($startDate = '+ 2 weeks', $endDate = '+ 4 weeks'),        
        'precio' => $faker->numberBetween($min = 100, $max =800),
        'origin_id'=>$origen->random()->id,
        'destiny_id'=>$destino->random()->id,
        'packagehotel_id'=>$packagehotel->random()->id,
        'packagecar_id'=>$packagecar->random()->id
    ];
});
