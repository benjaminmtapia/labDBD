<?php

use Faker\Generator as Faker;

$factory->define(App\room::class, function (Faker $faker) {
    return [
        'clase'=>$faker->numberBetween($min=100, $max=200),
        'capacidad'=>$faker->randomElement($array = array('2', '5'))
    ];
});
