<?php

use Faker\Generator as Faker;

$factory->define(App\origin::class, function (Faker $faker) {
    return [
        'ciudad'=>$faker->city
    ];
});
