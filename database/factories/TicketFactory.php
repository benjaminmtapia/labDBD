<?php

use Faker\Generator as Faker;

$factory->define(App\ticket::class, function (Faker $faker) {
    return [
        'num_asiento' => $faker->numberBetween(1, 100),
        'hora' => $faker->dateTime($max = 'now', $timezone = null),
        'origen' => $faker->city,
        'destino' => $faker->city,
        'doc_identificacion' => str_random(40),
        'tipo_pasajero' => $faker->firstName,
        'flight_id' => rand(1,10),
    ];
});
