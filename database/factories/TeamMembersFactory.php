<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\TeamMember;
use Faker\Generator as Faker;

$factory->define(TeamMember::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'teamrole' => $faker->word,
        'teamimage' => 'faker.jpg',
        'main' => 0
    ];
});
