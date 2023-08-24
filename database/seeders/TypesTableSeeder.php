<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('types') as $type) {

            $type = Type::create([

                "name"              => $type['name'],
                "description"       => $type['description'],
                "img"               => $type['img'],



            ]);
        }
    }
}
