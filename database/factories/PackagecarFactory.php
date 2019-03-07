<?php

use Faker\Generator as Faker;

$factory->define(App\packagecar::class, function (Faker $faker) {
	$reserva = DB::table('reservations')->select('id')->get();
    return [
    	'precio'=>rand(200,800),
        'disponible'=>$faker->boolean($chanceOfGettingTrue = 100),
        'descuento'=>rand(0.15,0.3)
    ];
});
