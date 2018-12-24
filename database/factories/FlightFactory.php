<?php

use Faker\Generator as Faker;

$factory->define(App\flight::class, function (Faker $faker) {
    return [
        'fecha_ida' => $faker->dateTimeThisMonth($max = 'now'),
        'capacidad' => $faker->numberBetween($min = 379, $max = 379),
        'num_pasajeros' => $faker->numberBetween($min = 144, $max = 379),           
    ];
});
