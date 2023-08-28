<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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

        $user = config('users');

        foreach ($user as $arrUsers) {
            $user = User::create([

                "name"          => $arrUsers['name'],
                "lastname"      => $arrUsers['lastname'],
                "email"         => $arrUsers['email'],
                "password"      => Hash::make('password'),
            ]);
        }
    }
}
