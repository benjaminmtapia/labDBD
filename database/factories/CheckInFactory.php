<?php

use Faker\Generator as Faker;

$factory->define(App\check_in::class, function (Faker $faker) {
  $vuelo = DB::table('flights')->select('id')->get();
	$reserva = DB::table('reservations')->select('id')->get();
    return [
 //   	'cod_reserva'=>$faker->bankAccountNumber,
        'apellido'=>$faker->lastName,
        'flight_id'=>$vuelo->random()->id,
        'reservation_id'=>$reserva->random()->id
    ];
});
