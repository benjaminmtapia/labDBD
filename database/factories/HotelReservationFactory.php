<?php

use Faker\Generator as Faker;

$factory->define(App\hotel_reservation::class, function (Faker $faker) {
	$habitacion = DB::table('rooms')->select('id')->get();
	$reserva = DB::table('reservations')->select('id')->get();
	$paquete = DB::table('packages')->select('id')->get();
    return [
    	'cantidad_personas'=>$faker->numberBetween($min=1, $max=5),
    	'cantidad_personas'=>$faker->numberBetween(1,5),
    	'room_id'=>$habitacion->random()->id,
    	'package_id'=>$paquete->random()->id,
    	'reservation_id'=>$reserva->random()->id
    ];
});
