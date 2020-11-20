<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Productos;
use Faker\Generator as Faker;

$factory->define(Productos::class, function (Faker $faker) {
    return [
        'Nombre'=> $faker->word,
        'persona' => App\Personas::all()->random()->id,
    ];
});
