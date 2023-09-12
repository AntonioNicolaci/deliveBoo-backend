<?php

namespace App\Http\Controllers\Api\Orders;

use App\Models\Order;
use App\Models\Plate;
use App\Models\OrderPlate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'address' => ['required', 'string', 'max:50'],
            'pc' => ['required', 'max:5'],
            'phone' => ['required', 'string', 'max:10'],
            'date' => ['required', 'date'],
            'card_number' => ['required', 'min:16', 'max:16'],
            'cvv' => ['required', 'min:3', 'max:3'],
            'card_name' => ['required', 'string', 'max:255'],
            'plates' => ['required', 'min:1']
        ]);
            
        $data = $request->all();

        $newOrder = new Order();

        $newOrder->restaurant_id = $data['res_id'];
        $newOrder->name = $data['name'];
        $newOrder->lastname = $data['lastname'];
        $newOrder->pc = $data['pc'];
        $newOrder->address = $data['address'];
        $newOrder->phone = strval($data['phone']);
        $newOrder->date = $data['date'];
        $newOrder->status = 1;
        $newOrder->price = $data['price'];
        $newOrder->save();

        return response(200);
        
    }
}
