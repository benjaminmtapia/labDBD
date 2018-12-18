<?php

use Faker\Generator as Faker;

$factory->define(App\passenger::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->name,
        'apellido'=>$faker->lastName,
        'num_asiento'=>$faker->numberBetween(1,100),
        'num_vuelo'=>$faker->unique()->randomDigit
    ];
});
