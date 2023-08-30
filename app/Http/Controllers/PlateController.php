<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plate;
use App\Models\Type;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

        $types = Type::all();

        return view('plates.create', compact('plates', 'types'));
    }


    public function store(Request $request)
    {
        $request->validate($this->validation);

        $data = $request->all();

        // salvare i dati nel db (questo metodo anche se è più lungo è il più sicuro)
        $newPlate = new Plate();

        $newPlate->name = $data['name'];
        $newPlate->ingredients = $data['ingredients'];
        $newPlate->price = $data['price'];
        $newPlate->visibility = $data['visibility'];
        $newPlate->save();

        return redirect()->route('dashboard.index', ['plate' => $newPlate]);
    }


    public function show($id)
    {
        //
    }


    public function edit(Plate $plate)
    {
        return view('plates.edit', compact('plate'));
    }


    public function update(Request $request, Plate $plate)
    {
        $request->validate($this->validation);

        $data = $request->all();

        $plate->name = $data['name'];
        $plate->ingredients = $data['ingredients'];
        $plate->price = $data['price'];
        $plate->visibility = $data['visibility'];
        $plate->update();

        return redirect()->route('plates.edit', ['plate' => $plate->id]);
    }


    public function destroy(Plate $plate)
    {
        $plate->delete();

        return redirect()->route('dashboard.index')->with('delete_success', $plate);
    }
}
