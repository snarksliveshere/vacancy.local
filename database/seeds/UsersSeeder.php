<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'moderator';
        $user->email = 'moderator@moderator.com';
        $user->password = bcrypt('moderator');
        $user->save();
        $role = \App\Role::whereName('moderator')->first();
        $user->roles()->save($role);
    }
}
