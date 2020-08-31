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
Route::post('/user/add', 'UserController@store');
Route::put('/user/{id}', 'UserController@update');

//supplier
Route::get('/supplier', 'SupplierController@index');
Route::get('/supplier/{id}', 'SupplierController@show');
Route::post('/supplier/add', 'SupplierController@store');
Route::put('/supplier/{id}', 'SupplierController@update');

//kategori
Route::get('/kategori', 'KategoriController@index');
Route::get('/kategori/{id}', 'KategoriController@show');
Route::post('/kategori/add', 'KategoriController@store');
Route::put('/kategori/{id}', 'KategoriController@update');

//logistik
Route::get('/logistik', 'LogistikController@index');
Route::get('/logistik/{id}', 'LogistikController@show');
Route::post('/logistik/add', 'LogistikController@store');
Route::put('/logistik/{id}', 'LogistikController@update');