<?php

use Faker\Generator as Faker;

$factory->define(App\check_in::class, function (Faker $faker) {
    return [
        'cuenta'=>$faker->bankAccountNumber,
        'num_vuelo'=>$faker->bankAccountNumber
    ];
});
