<?php

use Faker\Generator as Faker;

$factory->define(App\Secure::class, function (Faker $faker) {
    $passenger = DB::table('passengers')->select('id')->get();
    $reservation = DB::table('reservations')->select('id')->get();
    return [
        'tipo'=>$faker->randomElement(['Individual', 'Grupal']),
        'precio'=>$faker->numberBetween($min=200, $max=600),
        'servicioMedico'=>$faker->randomElement(['Normal', 'Premium', 'Gold']),
        'servicio2'=>$faker->randomElement(['Retraso de viaje', 'Pérdida de  equipaje', 'Cancelación de viaje', 'Incluye seguro por accidentes']),
        'servicio3'=>$faker->randomElement(['Cobertura en caso de otro evento terrorista distinto a secuestro', 'Localización y seguimiento de equipaje', 'Muerte accidental']),
        'edad'=>$faker->numberBetween($min=10, $max=80),
        'passenger_id'=>$passenger->random()->id
     //   'reservation_id'=>$reservation->random()->id
    ];
});
