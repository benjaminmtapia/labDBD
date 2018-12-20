<?php

use Faker\Generator as Faker;

$factory->define(App\car::class, function (Faker $faker) {
    return [
    	'patente'=>$faker->name,
    	'marca'=>$faker->name,
    	'modelo'=>$faker->name,
    	'capacidad'=>$faker->numberBetween($min = 3, $max = 5),
    	
    ];
});
            