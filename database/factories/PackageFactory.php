<?php

use Faker\Generator as Faker;

$factory->define(App\package::class, function (Faker $faker) { 
	$reservation = DB::table('reservations')->select('id')->get();
    return [
    	'precio'=>$faker->numberBetween(600, 800),
    	'disponible'=>$faker->boolean(50),
    	'reservation_id'=>$reservation->random()->id
    ];
});
