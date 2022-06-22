<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'incident_id' => rand(1,10),
        'user_id'     => rand(2,10),
        'body'        => $faker->text,
        
    ];
});
