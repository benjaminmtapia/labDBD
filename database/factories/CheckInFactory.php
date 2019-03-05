<?php

use Faker\Generator as Faker;

$factory->define(App\check_in::class, function (Faker $faker) {
	$pasajero = DB::table('passengers')->select('id')->get();
	$reserva = DB::table('reservations')->select('id')->get();
    return [
    	'genero'=>$faker->randomElement(['masculino','femenino','otro']),
    	'email' => $faker->unique()->safeEmail,
    	'nacionalidad'=>$faker->country,
    	'nombre_contacto'=>$faker->name,
    	'telefono_contacto'=>$faker->phoneNumber,
        'passenger_id'=>$pasajero->random()->id,
        'reservation_id'=>$reserva->random()->id
    ];
});
