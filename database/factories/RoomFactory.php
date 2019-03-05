<?php

use Faker\Generator as Faker;

$factory->define(App\room::class, function (Faker $faker) {
    $hotel = DB::table('hotels')->select('id')->get();
    $paquete = DB::table('packages')->select('id')->get();
    return [
        'numero'=>$faker->numberBetween(1,5),
        'capacidad'=>$faker->numberBetween(2,5),
        'precio'=>$faker->numberBetween(300,700),
        'disponible'=>$faker->boolean($chanceOfGettingTrue = 100),
        'hotel_id'=>$hotel->random()->id,
        'package_id'=>$paquete->random()->id,
        'fecha_ida' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 10 days'),
        'fecha_vuelta' => $faker->dateTimeBetween($startDate = '+ 10 days', $endDate = '+ 20 days'),
    ];
});
