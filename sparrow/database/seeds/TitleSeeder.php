<?php

use App\Platform;
use App\Title;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platform_switch = Platform::where('name', 'Nintendo Switch')->first();
        $platform_xbox = Platform::where('name', 'Xbox Series X')->first();
        $platform_playstation = Platform::where('name', 'PlayStation 5')->first();

        Title::create([
            'name' => 'Hyrule Warriors: Age of Calamity',
            'edition' => 'Standard',
            'platform_id' => $platform_switch->id,
            'state' => 1,
        ]);

        Title::create([
            'name' => 'Horizon Forbidden West',
            'edition' => 'Standard',
            'platform_id' => $platform_playstation->id,
            'state' => 1,
        ]);

        Title::create([
            'name' => 'Call of Duty Black Ops: Cold War',
            'edition' => 'Standard',
            'platform_id' => $platform_xbox->id,
            'state' => 1,
        ]);
    }
}
