<?php

use Faker\Generator as Faker;

$factory->define(App\check_in::class, function (Faker $faker) {
    return [
 //   	'cod_reserva'=>$faker->bankAccountNumber,
        'cuenta'=>$faker->numberBetween($min = 1, $max = 2147483648),
        'num_vuelo'=>$faker->numberBetween($min = 1, $max = 2147483648),
    ];
});
