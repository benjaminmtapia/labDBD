<?php

use Faker\Generator as Faker;

$factory->define(App\package::class, function (Faker $faker) { 
	$reservation = DB::table('reservations')->select('id')->get();
    return [
    	'precio'=>$faker->numberBetween(600, 800),
    	'disponible'=>$faker->boolean($chanceOfGettingTrue = 100),
//    	'reservation_id'=>$reservation->random()->id
    ];
});
