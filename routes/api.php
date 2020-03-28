<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// contacts
Route::get('contacts', 'ContactController@all');
Route::get('contacts/{id}', 'ContactController@get');
// Route::post('contacts/store', 'ContactController@store');
// Route::post('contacts/update/{id}', 'ContactController@update');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
