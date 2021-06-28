<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Mail;
use Faker\Generator as Faker;

$factory->define(Mail::class, function (Faker $faker) {
    return [
        'name' => 'Faouzi Dakir',
        'email' => $faker->email,
        'subject' => $faker->word,
        'message' => $faker->paragraph
    ];
});
