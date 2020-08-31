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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//user
Route::get('/user', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/user', 'UserController@store');
Route::put('/user/{id}', 'UserController@update');

//supplier
Route::get('/supplier', 'UserController@index');
Route::get('/supplier/{id}', 'UserController@show');
Route::post('/supplier', 'UserController@store');
Route::put('/supplier/{id}', 'UserController@update');

//kategori
Route::get('/kategori', 'UserController@index');
Route::get('/kategori/{id}', 'UserController@show');
Route::post('/kategori', 'UserController@store');
Route::put('/kategori/{id}', 'UserController@update');

//logistik
Route::get('/logistik', 'UserController@index');
Route::get('/logistik/{id}', 'UserController@show');
Route::post('/logistik', 'UserController@store');
Route::put('/logistik/{id}', 'UserController@update');