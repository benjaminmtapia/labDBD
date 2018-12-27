<?php

use Faker\Generator as Faker;

$factory->define(App\room::class, function (Faker $faker) {
    return [
        'numero'=>$faker->numberBetween(1,5),
        'capacidad'=>$faker->numberBetween(2,5),
        'disponible'=>$faker->boolean
    ];
});
