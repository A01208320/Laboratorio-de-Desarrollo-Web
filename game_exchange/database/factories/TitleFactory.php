<?php

namespace Database\Factories;

use App\Models\Title;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class TitleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Title::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $faker->name,
            'clase_hora_inicio' => $faker->time,
            'clase_hora_fin' => $faker->time,
            'coach_id' => factory(\App\Coach::class),
        ];
    }
}
