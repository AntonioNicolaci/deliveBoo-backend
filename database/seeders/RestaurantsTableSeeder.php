<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('restaurants') as $restaurant) {

            $restaurant = Restaurant::create([

                "name"               => $restaurant['name'],
                "address"            => $restaurant['address'],
                "vat"                => $restaurant['vat'],
                "img"                => $restaurant['img'],
            ]);
        }
    }
}
