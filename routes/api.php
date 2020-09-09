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

//role
Route::get('/role', 'RoleController@index');
Route::get('/role/{id}', 'RoleController@show');
Route::post('/role', 'RoleController@store');
Route::put('/role/{id}', 'RoleController@update');

//menu
Route::get('/menu', 'MenuController@index');
Route::get('/menu/{id}', 'MenuController@show');
Route::post('/menu', 'MenuController@store');
Route::put('/menu/{id}', 'MenuController@update');

//supplier
Route::get('/supplier', 'SupplierController@index');
Route::get('/supplier/all', 'SupplierController@showAll');
Route::get('/supplier/{id}', 'SupplierController@show');
Route::get('/supplier/cari', 'SupplierController@cari');
Route::post('/supplier', 'SupplierController@store');
Route::put('/supplier/{id}', 'SupplierController@update');

//kategori
Route::get('/kategori', 'KategoriController@index');
Route::get('/kategori/{id}', 'KategoriController@show');
Route::post('/kategori', 'KategoriController@store');
Route::put('/kategori/{id}', 'KategoriController@update');

//logistik
Route::get('/logistik', 'LogistikController@index');
Route::get('/logistik/{id}', 'LogistikController@show');
Route::post('/logistik', 'LogistikController@store');
Route::put('/logistik/{id}', 'LogistikController@update');