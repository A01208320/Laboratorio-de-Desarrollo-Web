<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plataforma;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Plataforma::class, function (Faker $faker) {
    return [
        //
        'plataforma_nombre' => $faker->name,
    ];
});
