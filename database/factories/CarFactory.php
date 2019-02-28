<?php

use Faker\Generator as Faker;

$factory->define(App\car::class, function (Faker $faker) {
	$paquete = DB::table('packages')->select('id')->get();
	$reserva = DB::table('reservations')->select('id')->get();
    $destino = DB::table('destinies')->select('id')->get();
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
    $v = $faker->vehicleArray();
    
    return [
        'fecha_ida' => $faker->dateTimeThisYear($min = 'now'),
        'fecha_vuelta' => $faker->dateTimeThisYear($min= 'now'),
    	'patente'=>$faker->vehicleRegistration('[A-Z]{2}-[0-9]{4}'),
    	'marca'=>$v['brand'],
    	'modelo'=>$v['model'],
        'capacidad'=>$faker->numberBetween($min = 3, $max = 5),
        'precio'=>$faker->numberBetween($min = 200, $max =600),
		'disponibilidad'=>$faker->boolean(50),
    	'package_id'=>$paquete->random()->id,
    	'reservation_id'=>$reserva->random()->id,
        'destiny_id'=>$destino->random()->id
    ];
});
