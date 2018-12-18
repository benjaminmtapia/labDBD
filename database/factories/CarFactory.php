<?php

use Faker\Generator as Faker;

$factory->define(App\car::class, function (Faker $faker) {
    return [
    	'patente'=>$faker->vehicleRegistration,
    	'marca'=>$faker->vehicleBrand,
    	'modelo'=>$faker->vehicleModel,
    	'capacidad'=>$faker->numberBetween($min = 1, $max = 5)
    ];
});
            