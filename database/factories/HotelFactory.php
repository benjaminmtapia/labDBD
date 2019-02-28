<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
	$destino = DB::table('destinies')->select('id')->get();
    return [
    	'ciudad'=>$faker->city,
    	'nombre'=>$faker->company,
    	'clase'=>$faker->numberBetween($min=1, $max=5), 
    	'disponible'=>$faker->boolean($chanceOfGettingTrue = 100),
    	'destiny_id'=>$destino->random()->id
    ];
});
