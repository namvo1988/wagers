<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Wagers;

Route::get('wagers', 'WagersController@index');
Route::get('wagers/{wagers}', 'WagersController@show');
Route::post('wagers', 'WagersController@store');

Route::post('buy/{wagers}', 'CartController@buyWagers');

//Route::fallback(function(){
//    return response()->json([
//        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
//});
