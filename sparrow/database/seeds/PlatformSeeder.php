<?php

use App\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::create(['name' => 'Nintendo Switch']);
        Platform::create(['name' => 'Xbox Series X']);
        Platform::create(['name' => 'Play Switch']);
    }
}
