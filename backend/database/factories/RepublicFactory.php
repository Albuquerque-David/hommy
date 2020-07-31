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
        'value'=> $faker->randomFloat(0,0,1000),
        'bathrooms' => $faker->randomDigit,
        'allowedTo' => $faker->randomElement(['Masculino', 'Feminino', 'Ambos']), 
        'rating'=>$faker->randomFloat(2, 0, 5),
        'tenant_id' => factory('App\Tenant')->create()->id,
    ];
});


