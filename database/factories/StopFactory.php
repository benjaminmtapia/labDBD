<?php

use Faker\Generator as Faker;

$factory->define(App\stop::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->name
    ];
});
