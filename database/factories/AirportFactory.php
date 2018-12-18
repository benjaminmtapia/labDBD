<?php

use Faker\Generator as Faker;

$factory->define(App\airport::class, function (Faker $faker) {
    return [
        'ciudad'=>$faker->company,
        'nombre'=>$faker->name,
        'id_origen'=>$faker->numberBetween(10.100000),
        'id_destino'=>$faker->numberBetween(10,100000)
    ];
});
