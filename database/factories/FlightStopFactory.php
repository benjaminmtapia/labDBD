<?php

use Faker\Generator as Faker;

$factory->define(App\Flight_Stop::class, function (Faker $faker) {
	$vuelo = DB::table('flights')->select('id')->get();
	$parada = DB::table('stops')->select('id')->get();	
    return [
        'fight_id'=>$vuelo->random()->id,
        'stop_id'=>$parada->random()->id
    ];
});
