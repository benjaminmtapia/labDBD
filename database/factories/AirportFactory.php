<?php

use Faker\Generator as Faker;

$factory->define(App\airport::class, function (Faker $faker) {
	$origen = DB::table('destinies')->select('id')->get();
	$destino = DB::table('destinies')->select('id')->get();
    return [
        'ciudad'=>$faker->name,
        'nombre'=>$faker->company,
        'id_origen'=>$origen->random()->id,
        'id_destino'=>$destino->random()->id
    ];
});
