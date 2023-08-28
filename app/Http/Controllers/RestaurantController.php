<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function processUserRestaurants()
    {
        $user = User::find(1);

        $restaurantsData[] = [];

        foreach ($user->restaurants as $restaurant) {
            $restaurantsData[] = [
                'name' => $restaurant->rest_name,
                'user_id' => $restaurant->user_id,
                'address' => $restaurant->address,
                'vat' => $restaurant->vat,
                'img' => $restaurant->img,
            ];
        }

        return view('user.restaurants', ['restaurantsData' => $restaurantsData]);
    }

    public function index()
    {
        $users = User::all();
        $plates = Plate::with('restaurant')->where('restaurant_id', Auth::id())->get();
        $restaurants = Restaurant::with('user')->where('user_id', Auth::id())->get();

        return view('dashboard', compact('restaurants', 'plates'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Restaurant $restaurant)
    {
        //
    }

    public function edit(Restaurant $restaurant)
    {
        //
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
