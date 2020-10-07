<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'registeredUser']);
        Role::create(['name' => 'user']);
    }
}
