<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Projects;
use Faker\Generator as Faker;

$factory->define(Projects::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'message' => $faker->sentence,
        'icone' => 'flaticon-009-idea-3',
        'image' => 'faker.jpg'
    ];
});
