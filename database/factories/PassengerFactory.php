<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(App\passenger::class, function (Faker $faker) {
	$asiento = DB::table('seats')->select('id')->get();
    return [
        'nombre'=>$faker->firstName,
        'apellido'=>$faker->lastName,
        'edad'=>$faker->numberBetween(1, 99),
        'doc_identidad'=>Str::random(15)
    ];
});
