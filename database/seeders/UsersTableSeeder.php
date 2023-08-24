<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
