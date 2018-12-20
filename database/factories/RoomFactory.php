<?php

use Faker\Generator as Faker;

$factory->define(App\room::class, function (Faker $faker) {
    return [
        'numero'=>$faker->numberBetween($min=1, $max=5),
        'capacidad'=>$faker->randomElement($array = array('2', '5'))
    ];
});
