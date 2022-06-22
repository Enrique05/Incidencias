<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Operator;
use Faker\Generator as Faker;

$factory->define(Operator::class, function (Faker $faker) {
    return [
        //
       'user_id' => rand(1,3),
        
    ];
});
