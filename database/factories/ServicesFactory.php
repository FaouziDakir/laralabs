<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
       'icone' => 'flaticon-009-idea-3',
       'titre' => $faker->sentence,
       'texte' => $faker->paragraph
    ];
});
