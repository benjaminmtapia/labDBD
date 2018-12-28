<?php

use Faker\Generator as Faker;

$factory->define(App\flightpackage::class, function (Faker $faker) {
	$flight = DB::table('flights')->select('id')->get();
	$package = DB::table('packages')->select('id')->get();
    return [
        'flight_id'=>$flight->random()->id,
        'package_id'=>$package->random()->id
    ];
});
