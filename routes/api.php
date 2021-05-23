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

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('users', 'api/http/HomeController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/topup', 'HomeController@topup');
Route::post('/home/topup-post', 'HomeController@topupsave');

Route::get('/home/withdraw', 'HomeController@withdraw');
Route::post('/home/withdraw-post', 'HomeController@withdrawsave');

Route::get('/home/transfer', 'HomeController@transfer');
Route::post('/home/transfer-post', 'HomeController@transfersave'); 