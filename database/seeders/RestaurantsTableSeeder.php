<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = Type::all()->pluck('id');
        foreach (config('restaurants') as $restaurant) {

            $restaurant = Restaurant::create([

                "name"               => $restaurant['rest_name'],
                "address"            => $restaurant['address'],
                "vat"                => $restaurant['vat'],
                "img"                => $restaurant['img'],
            ]);
            foreach ($restaurant['types'] as $type) {
                $restaurant->types()->sync($restaurant['types']);
            }
        }
    }
}
/*    {
        $technology = Technology::all()->pluck('id');
        foreach (config('projects') as $objProject) {
            $project = Project::create([
                "title" => $objProject['title'],
                "creation_date" => $objProject['creation_date'],
                "description" => $objProject['description'],
                "link_github" => $objProject['link_github'],
            ]);
            foreach ($objProject['technologies'] as $technology) {
                $project->technologies()->sync($objProject['technologies']);
            }
        }
    }
    */