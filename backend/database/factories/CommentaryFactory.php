<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Commentary;
use Faker\Generator as Faker;

$factory->define(Commentary::class, function (Faker $faker) {
    return [
        'commentary'=>$faker->text,
        'republic_id'=>factory('App\Republic')->create()->id,
        'renter_id'=>factory('App\Renter')->create()->id,
    ];
});
