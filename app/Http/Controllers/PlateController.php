<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlateController extends Controller
{

    private $validation = [
        'name'               => 'required|string|max:50',
        'ingredients'        => 'required|string',
        'price'              => 'required|integer',
        'visibility'         => 'required|boolean',
    ];


    public function index()
    {
        $plates = Plate::all();

        return view('dashboard.index', compact('plates'));
    }


    public function create()
    {
        $plates = Plate::all();

        return view('plates.create', compact('plates'));
    }


    public function store(Request $request)
    {
        $request->validate($this->validation);

        $data = $request->all();
        $restaurant_id = DB::table('restaurants')->where('user_id', Auth::id())->select('restaurants.id')->get();

        // salvare i dati nel db (questo metodo anche se è più lungo è il più sicuro)
        $newPlate = new Plate();

        $newPlate->restaurant_id = $restaurant_id[0]->id;
        $newPlate->name = $data['name'];
        $newPlate->ingredients = $data['ingredients'];
        $newPlate->price = $data['price'];
        $newPlate->visibility = $data['visibility'];
        $newPlate->save();

        return redirect()->route('dashboard.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Plate $plate)
    {
        $plate->delete();

        return redirect()->route('dashboard.index')->with('delete_success', $plate);
    }
}
