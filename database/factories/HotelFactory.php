<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    return [
    	'ciudad'=>$faker->city,
    	'nombre'=>$faker->name,
    	'clase'=>$faker->numberBetween($min=1, $max=5)
    ];
});
