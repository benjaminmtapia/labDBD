<?php

use Faker\Generator as Faker;

$factory->define(App\Carrito::class, function (Faker $faker) {
    return [
		'fecha_ida' => $faker->dateTimeThisMonth($max = 'now')
    ];
});
