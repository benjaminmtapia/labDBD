<?php

use Faker\Generator as Faker;

$factory->define(App\purchase::class, function (Faker $faker) {
    return [
    	'fecha'=>$faker->dateTime($max = 'now', $timezone = null)
    ];
});
