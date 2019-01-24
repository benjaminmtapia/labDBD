<?php

use Faker\Generator as Faker;

$factory->define(App\reservation::class, function (Faker $faker) {
	$usuario = DB::table('users')->select('id')->get();
    return [
        'monto'=>$faker->numberBetween(1000,10000),
        'num_pasaporte'=>$faker->numberBetween(1,100),
        'num_reserva_hotel'=>$faker->numberBetween(0,5),
        'user_id'=>$usuario->random()->id
        
    ];
});
