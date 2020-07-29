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
        'value'=> $faker->randomFloat,
        'bathrooms' => $faker->randomDigit,
        'allowedTo' => 'gender', 
        'tenant_id' => factory('App\Tenant')->create()->id,
    ];
});
