<?php

use Faker\Generator as Faker;

$factory->define(App\destiny::class, function (Faker $faker) {
	$aeropuerto = DB::table('airports')->select('id')->get();
    return [
         'ciudad'=>$faker->name
    ];
});
