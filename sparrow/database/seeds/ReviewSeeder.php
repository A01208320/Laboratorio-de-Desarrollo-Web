<?php

use App\User;
use App\Title;
use App\Review;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $hyruleWarrriors = Title::where('name', 'Hyrule Warriors: Age of Calamity')->first();
        $horizon = Title::where('name', 'Horizon Forbidden West')->first();
        $cod = Title::where('name', 'Call of Duty Black Ops: Cold War')->first();
        $registeredUser = User::where('name', 'registeredUser')->first();
        Review::create([
            'title_id' => $hyruleWarrriors->id,
            'user_id' => $registeredUser->id,
            'recomendation' => 1,
            'comment' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);
        Review::create([
            'title_id' => $horizon->id,
            'user_id' => $registeredUser->id,
            'recomendation' => 1,
            'comment' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);
        Review::create([
            'title_id' => $cod->id,
            'user_id' => $registeredUser->id,
            'recomendation' => 1,
            'comment' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);
    }
}
