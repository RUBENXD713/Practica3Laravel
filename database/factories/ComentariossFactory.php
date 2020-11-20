<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentarioss;
use Faker\Generator as Faker;

$factory->define(Comentarioss::class, function (Faker $faker) {
    return [
        
            'Contenido'=> $faker->paragraph,
            'productos'=> App\Productos::all()->random()->id,
            'Persona' => App\Personas::all()->random()->id,
    ];
});
