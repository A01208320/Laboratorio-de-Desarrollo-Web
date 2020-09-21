<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plataforma;
use App\Titulo;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Titulo::class, function (Faker $faker) {
    return [
        'plataforma_id' => factory(\App\Plataforma::class),
        'titulo_nombre' => $faker->name,
        'titulo_edicion' => $faker->name,
        'titulo_estado' => $faker->boolean(0), //Chance of getting true.
    ];
});
