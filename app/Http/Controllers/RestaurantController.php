<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // restaurantService.php
    public function processUserRestaurants($userId)
    {
        $user = User::find($userId);

        $restaurantsData[] = [];

        foreach ($user->restaurants as $restaurant) {
            $restaurantsData[] = [
                'name' => $restaurant->rest_name,
                'address' => $restaurant->address,
                'vat' => $restaurant->vat,
                'img' => $restaurant->img,
            ];
        }

        return view('user.restaurants', ['restaurantsData' => $restaurantsData]);
    }
}
