<?php

use Faker\Generator as Faker;

$factory->define(App\room::class, function (Faker $faker) {
	$hotel = DB::table('hotels')->select('id')->get();
	$package = DB::table('packages')->select('id')->get();
    return [
        'numero'=>$faker->numberBetween(1,5),
        'capacidad'=>$faker->numberBetween(2,5),
        'hotel_id'=>$hotel->random()->id,
        'package_id'=>$package->random()->id
    ];
});
