<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    return [
    	'ciudad'=>$faker->city,
    	'nombre'=>$faker->company,
    	'clase'=>$faker->numberBetween($min=1, $max=5), 
    	'disponible'=>$faker->boolean(50)
    ];
});
