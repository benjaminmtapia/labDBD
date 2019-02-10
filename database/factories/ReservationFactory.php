<?php

use Faker\Generator as Faker;

$factory->define(App\reservation::class, function (Faker $faker) {
	$usuario = DB::table('users')->select('id')->get();
    return [
        'precio'=>$faker->numberBetween($min = 0),
        'num_pasaporte'=>$faker->numberBetween(1,100),
        'user_id'=>$usuario->random()->id,
		'fecha_reserva'=>$faker->dateTimeThisMonth($max = 'now')
    ];
});
