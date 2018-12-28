<?php

use Faker\Generator as Faker;

$factory->define(App\administrator_package::class, function (Faker $faker) {
        $administrator = DB::table('administrators')->select('id')->get();
	$package = DB::table('packages')->select('id')->get();
    return [
        'administrator_id'=>$administrator->random()->id,

        'package_id'=>$package->random()->id
    ];
});
