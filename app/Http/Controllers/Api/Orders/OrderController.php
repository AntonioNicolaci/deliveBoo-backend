<?php

namespace App\Http\Controllers\Api\Orders;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function generate (Request $request, Gateway $gateway) {

        $token = $gateway->clientToken()->generate();
        
        $data = [
            'token' => $token
        ];

        return response()->json($data,200);
    }

    public function makePayment (Request $request, Gateway $gateway) {
        
    }
}
