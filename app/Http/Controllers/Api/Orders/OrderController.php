<?php

namespace App\Http\Controllers\Api\Orders;

use App\Models\Plate;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    public function generate (Request $request, Gateway $gateway) {

        $token = $gateway->clientToken()->generate();
        
        $data = [
            'token' => $token
        ];

        return response()->json($data,200);
    }

    public function makePayment (OrderRequest $request, Gateway $gateway) {

        $plate = Plate::find($request->plate);

        $result = $gateway->transaction()->sale([
            'amount' => $request->price,
            'paymentMethodNonce' => $request->token,
            'optuions' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success){
            $data = [
                'succes' => true,
                'message' => 'Transazione eseguita con successo'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'succes' => false,
                'message' => 'Transazione non eseguita'
            ];
            return response()->json($data, 401);
        }
    }
}
