<?php

namespace App\Http\Controllers;

use App\cart;
use App\Wagers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function buyWagers(cart $cart, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'buying_price' => 'required|numeric',
            'id'            => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $buying_price = $request->input('buying_price');
        $wagers_id = $request->input('id');
        $quantity = $request->input('quantity');

            //Check if the proudct exist or return 404 not found.
            try { $Product = Wagers::findOrFail($wagers_id);} catch (ModelNotFoundException $e) {
                return response()->json([
                    'message' => 'The Product you\'re trying to add does not exist.',
                ], 404);
            }

            $wager = Wagers::find($wagers_id);
            //buying_price must be lesser or equal to current_selling_price of the wager_id
            if($buying_price <= $wager->selling_price) {

                $wager->amound_sold = $wager->amound_sold + $quantity;
                $wager->save();
                $cart = cart::create([
                    'buying_price' => $buying_price,
                    'wager_id' => $wagers_id,
                    'quantity' => $quantity,
                    'bought_at' => date("Y-m-d H:i:s"),
                ]);
                return response()->json(['message' => 'Wager has been bought!'], 200);
            } else {
                return response()->json([
                    'message' => 'Invalid!',
                ], 400);
            }


    }
}
