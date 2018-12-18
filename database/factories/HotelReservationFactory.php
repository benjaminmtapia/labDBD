<?php

use Faker\Generator as Faker;

$factory->define(App\hotel_reservation::class, function (Faker $faker) {
    return [
    	'cantidad_personas'=>$faker->numberBetween($min=1, $max=5)
    ];
});
