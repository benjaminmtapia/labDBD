<?php

use Faker\Generator as Faker;

$factory->define(App\Carrito::class, function (Faker $faker) {
	$user = DB::table('users')->select('id')->get();
    return [
		'fecha' => $faker->dateTimeThisMonth($max = 'now'),
		'user_id' => $faker->unique()->numberBetween(1, 10)
    ];
});
