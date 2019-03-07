<?php

use Faker\Generator as Faker;

$factory->define(App\Seat::class, function (Faker $faker) {
    $reservation = DB::table('reservations')->select('id')->get();
    $packagecar = DB::table('packagecars')->select('id')->get();
    $packagehotel = DB::table('packagehotels')->select('id')->get();
    $flight = DB::table('flights')->select('id')->get();
    $passenger = DB::table('passengers')->select('id')->get();
    return [
        'letra'=>$faker->randomLetter(),
        'numero'=>$faker->numberBetween(1,10),
        'tipo'=>$faker->randomElement(['Economico','Business','Primera']),
        'precio'=>$faker->numberBetween(150,800),
        'disponibilidad'=>$faker->boolean($chanceOfGettingTrue = 100),
        'check_in'=>$faker->boolean($chanceOfGettingTrue = 0),
        //'reservation_id'=>$reservation->random()->id,
        'packagecar_id'=>$packagecar->random()->id,
        'packagehotel_id'=>$packagehotel->random()->id,
        'flight_id'=>$flight->random()->id
        //'passenger_id'=>$passenger->random()->id,
    ];
});
