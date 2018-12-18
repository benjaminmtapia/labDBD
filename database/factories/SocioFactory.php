<?php

use Faker\Generator as Faker;

$factory->define(App\socio::class, function (Faker $faker) {
	// $email_user = \DB::table('user')->select('email')->get();
    return [
        'numero'=>$faker->numberBetween(1,10),
        'email'=>$faker->email(),
        'millas'=>$faker->numberBetween(0,100000)
    ];
});
