<?php

use Faker\Generator as Faker;

$factory->define(App\package::class, function (Faker $faker) {
    return [
    	'descuento'=>$faker->numberBetween($min=10, $max=50),
    	'fecha_vencimiento'=>$faker->dateTime($max = 'now', $timezone = null)
    ];
});
