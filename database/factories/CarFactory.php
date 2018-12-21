<?php

use Faker\Generator as Faker;

$factory->define(App\car::class, function (Faker $faker) {
	$paquete = DB::table('packages')->select('id')->get();
	$reserva = DB::table('reservations')->select('id')->get();
    return [

    	'patente'=>$faker->name,
    	'marca'=>$faker->name,
    	'modelo'=>$faker->name,
    	'capacidad'=>$faker->numberBetween($min = 3, $max = 5),
    	'package_id'=>$paquete->random()->id,
    	'reservation_id'=>$reserva->random()->id
    ];
});
            