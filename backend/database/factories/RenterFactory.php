<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Renter;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Renter::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'city' => $faker->city,
        'state'=> $faker->state,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'interestedNeighborhood' => $faker->cityPrefix,
        'phoneNumber' => '6947-6744',
        'bedroom_id' => null,
    ];
});
