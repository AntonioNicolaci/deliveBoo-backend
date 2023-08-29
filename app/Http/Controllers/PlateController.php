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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plates = Plate::all();

        return view('plates.create', compact('plates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
