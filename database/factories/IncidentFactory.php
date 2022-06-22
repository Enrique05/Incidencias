<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Incident;
use Faker\Generator as Faker;

$factory->define(Incident::class, function (Faker $faker) {
    return [
        //
        'nameIncident'  => $faker->sentence,
        'body'          => $faker->text,
        'status_id'     => rand(1,3),
        'user_id'       => rand(2,10),
        'operator_id'   => rand(1,3),
    ];
});
