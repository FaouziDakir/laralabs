<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'auteur' => 'Jean Pascal',
        'email' => $faker->email,
        'subject' => 'My Comment',
        'message' => $faker->sentence,
        'post_id' => 1
    ];
});
