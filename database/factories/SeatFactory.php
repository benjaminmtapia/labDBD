<?php

use Faker\Generator as Faker;

$factory->define(App\Seat::class, function (Faker $faker) {
    $reservation = DB::table('reservations')->select('id')->get();
    $package = DB::table('packages')->select('id')->get();
    $flight = DB::table('flights')->select('id')->get();
    $passenger = DB::table('passengers')->select('id')->get();
    return [
        'letra'=>$faker->randomLetter(),
        'numero'=>$faker->numberBetween(1,10),
        'disponibilidad'=>$faker->boolean($chanceOfGettingTrue = 100),
        'reservation_id'=>$reservation->random()->id,
        'package_id'=>$package->random()->id,
        'flight_id'=>$flight->random()->id,        
        'passenger_id'=>$passenger->random()->id
    ];
});