<?php

use Faker\Generator as Faker;

$factory->define(App\Secure::class, function (Faker $faker) {
    $passenger = DB::table('passengers')->select('id')->get();
    return [
        'tipo'=>$faker->randomElement(['Individual', 'Grupal']),
        'precio'=>$faker->numberBetween($min=200, $max=600),
        'passenger_id'=>$passenger->random()->id
    ];
});
