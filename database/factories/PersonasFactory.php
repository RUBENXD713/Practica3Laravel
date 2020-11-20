<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Personas;
use Faker\Generator as Faker;

$factory->define(Personas::class, function (Faker $faker) {
    return [
        'Nombre'=> $faker->name,
    ];
});
