<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role([
            'name' => 'moderator',
            'status' => 1,
            'rusname' => 'Модератор'
        ]);
        $role->save();

        $role = new \App\Role([
            'name' => 'author',
            'status' => 1,
            'rusname' => 'Автор'
        ]);
        $role->save();
    }
}
