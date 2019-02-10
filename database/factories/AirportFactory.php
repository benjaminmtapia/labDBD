<?php

use Faker\Generator as Faker;

$factory->define(App\airport::class, function (Faker $faker) {
	$origen = DB::table('origins')->select('id')->get();
	$destino = DB::table('destinies')->select('id')->get();
    return [
        'nombre'=>$faker->company,
        'origin_id'=>$origen->random()->id,
        'destiny_id'=>$destino->random()->id
    ];
});
