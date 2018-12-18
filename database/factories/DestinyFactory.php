<?php

use Faker\Generator as Faker;

$factory->define(App\destiny::class, function (Faker $faker) {
    return [
         'ciudad'=>$faker->name
    ];
});
