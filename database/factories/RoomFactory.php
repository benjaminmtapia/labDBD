<?php

use Faker\Generator as Faker;

$factory->define(App\room::class, function (Faker $faker) {
	$hotel = DB::table('hotels')->select('id')->get();
    return [
        'numero'=>$faker->numberBetween(1,5),
        'capacidad'=>$faker->numberBetween(2,5),
        'disponible'=>$faker->boolean(50),
        'hotel_id'=>$hotel->random()->id
    ];
});
