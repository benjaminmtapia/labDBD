<?php

use Faker\Generator as Faker;

$factory->define(App\reservationpackage::class, function (Faker $faker) {
	$reservation = DB::table('reservations')->select('id')->get();
	$package = DB::table('packages')->select('id')->get();
    return [
        'reservation_id'=>$reservation->random()->id,
        'package_id'=>$package->random()->id
    ];
});
