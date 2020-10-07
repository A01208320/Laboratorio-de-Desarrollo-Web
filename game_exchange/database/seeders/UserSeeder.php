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
        $registeredUser_role = Role::where('name', 'registeredUser')->first();
        $user_role = Role::where('name', 'user')->first();

        $administrator = User::create([
            'name' => 'administrator',
            'email' => 'administrator@administrator.com',
            'password' => bcrypt('administrator')
        ]);

        $registeredUser = User::create([
            'name' => 'registeredUser',
            'email' => 'registeredUser@registeredUser.com',
            'password' => bcrypt('registeredUser')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user')
        ]);

        $administrator->roles()->attach($administrator_role);
        $registeredUser->roles()->attach($registeredUser_role);
        $user->roles()->attach($user_role);
    }
}
