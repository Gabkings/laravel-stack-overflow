<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answers;
use Faker\Generator as Faker;

$factory->define(Answers::class, function (Faker $faker) {
    return [
        'answer' => $faker->paragraphs(rand(3, 7), true),
        'user_id' =>  App\User::pluck('id')->random(),
        'vote_count' => rand(0, 5),
    ];
});
