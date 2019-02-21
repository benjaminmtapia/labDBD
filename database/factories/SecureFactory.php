<?php

use Faker\Generator as Faker;

$factory->define(App\Secure::class, function (Faker $faker) {
    $passenger = DB::table('passengers')->select('id')->get();
    return [
        'tipo'=>$faker->randomElement(['individual', 'grupal']),    
        'passenger_id'=>$passenger->random()->id
    ];
});
