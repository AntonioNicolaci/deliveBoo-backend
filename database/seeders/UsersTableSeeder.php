<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('users') as $user) {

            $$user = User::create([

                "name"                => $$user['name'],
                "lastname"            => $$user['lastname'],
                "email"               => $$user['email'],
                "pw"                  => $$user['pw
                '],
            ]);
        }
    }
}
