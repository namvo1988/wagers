<?php

namespace App\Http\Controllers;

use App\Wagers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WagersController extends Controller
{
    public function index()
    {
        $limit = $_GET ? $_GET['limit'] : 5;
        if($_GET) {
            $wagers = DB::table('wagers')->simplePaginate($limit);
            return $wagers;
        } else {
            return Wagers::all();
        }
    }

    public function show(Wagers $wagers)
    {
        return $wagers;
    }

    public function store(Request $request)
    {
        $wagers = Wagers::create([
            'total_wager_value' => integerValue(),
            'odds' => integerValue(),
            'selling_percentage' => integerValue(rand(1,100)),
            'selling_price' => integerValue(rand(1,100)),
        ]);

        return response()->json([
            'Message' => 'Wagers has been placed!',
            'wagers'  => $wagers
        ], 201);
    }
}
