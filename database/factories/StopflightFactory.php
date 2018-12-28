<?php

use Faker\Generator as Faker;

$factory->define(App\stopflight::class, function (Faker $faker) {
	$flight = DB::table('flights')->select('id')->get();
	$stop = DB::table('stops')->select('id')->get();
    return [
        'flight_id'=>$flight->random()->id,
        'stop_id'=>$stop->random()->id
    ];
});
