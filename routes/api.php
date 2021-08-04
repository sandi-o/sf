<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/vessels', function () {
    // $response = Http::withoutVerifying()->withToken(env('AIS_TOKEN'))->get('https://ais.spire.com/vessels?last_known_position');

    // $geoBucket = array();
    // foreach($response->json()['data'] as $key => $value) {
    //     $coordinates = $value['last_known_position']['geometry']['coordinates'];

    //     $geoBucket[] = 'LNG: '.$coordinates[0].',  LON: '.$coordinates[1];
    // }

    // Storage::disk('public')->put( time() .'.json', json_encode($geoBucket));

});