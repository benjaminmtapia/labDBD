<?php

use Faker\Generator as Faker;

$factory->define(App\hotelreservation_package::class, function (Faker $faker) {
	$hotelreservation = DB::table('hotel_reservations')->select('id')->get();
	$package = DB::table('packages')->select('id')->get();
    return [
        'hotel_reservation_id'=>$hotelreservation->random()->id,
        'package_id'=>$package->random()->id
    ];
});
