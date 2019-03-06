<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\reservation::class, function (Faker $faker) {
	$usuario = DB::table('users')->select('id')->get();
    return [
        'precio'=>$faker->numberBetween(0,0),
        'num_pasaporte'=>$faker->numberBetween(1,100),
        'cod_reserva'=>Str::random(16),
        'user_id'=>$faker->numberBetween(1,1),
		'fecha_reserva'=>$faker->dateTimeThisMonth($max = 'now')
    ];
});
