<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Republic;
use Faker\Generator as Faker;

$factory->define(Republic::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'description' => $faker->text(100),
        'city' => $faker->city,
        'state'=> $faker->state,
        'neighborhood' => $faker->cityPrefix,
        'address' => $faker->address,
        'value'=> $faker->randomFloat(2,0,5000),
        'bathrooms' => $faker->randomDigit,
        'allowedTo' => 'gender', 
        'rating'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
        'tenant_id' => factory('App\Tenant')->create()->id,
    ];
});


