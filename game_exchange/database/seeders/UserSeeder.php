<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator_role = Role::where('name', 'administrator')->first();
        $registered_user_role = Role::where('name', 'registered_user')->first();
        $user_role = Role::where('name', 'user')->first();

        $administrator = User::create([
            'name' => 'administrator',
            'email' => 'administrator@administrator.com',
            'password' => bcrypt('administrator')
        ]);

        $registered_user = User::create([
            'name' => 'registered_user',
            'email' => 'registered_user@registered_user.com',
            'password' => bcrypt('registered_user')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user')
        ]);

        $administrator->roles()->attach($administrator_role);
        $registered_user->roles()->attach($registered_user_role);
        $user->roles()->attach($user_role);
    }
}
