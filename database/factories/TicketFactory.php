<?php

use Faker\Generator as Faker;

$factory->define(App\ticket::class, function (Faker $faker) {
	$vuelo = DB::table('flights')->select('id')->get();
	$reserva = DB::table('reservations')->select('id')->get();
    return [
        'num_asiento' => $faker->numberBetween(1, 100),
        'hora' => $faker->dateTime($max = 'now', $timezone = null),
        'origen' => $faker->city,
        'destino' => $faker->city,
        'doc_identificacion' => str_random(40),
        'tipo_pasajero' => $faker->randomElement($array = array ('discapacidad fisica','tercera edad','discapacidad sensorial', 'discapacidad cognitiva', 'movilidad reducida')),
        'flight_id' => $vuelo->random()->id,
        'reservation_id'=>$reserva->random()->id
    ];
});
