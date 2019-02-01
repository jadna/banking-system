<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/topup', 'HomeController@topup');
Route::post('/home/topup-post', 'HomeController@topupsave');

Route::get('/home/withdraw', 'HomeController@withdraw');
Route::post('/home/withdraw-post', 'HomeController@withdrawsave');

Route::get('/home/transfer', 'HomeController@transfer');
Route::post('/home/transfer-post', 'HomeController@transfersave'); 
