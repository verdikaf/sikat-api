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

//dashboard
Route::get('/chart/logistik', 'DashboardController@chartLogistik');

//contact us
Route::get('/contact', 'ContactController@index');
Route::get('/contact/{id}', 'ContactController@show');
Route::post('/contact', 'ContactController@store');
Route::put('/contact/{id}', 'ContactController@update');

//login
Route::post('/login', 'UserController@login');

//user
Route::get('/user', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/user', 'UserController@store');
Route::post('/user/search', 'UserController@search');
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
Route::post('/supplier/search', 'SupplierController@search');
Route::post('/supplier', 'SupplierController@store');
Route::put('/supplier/{id}', 'SupplierController@update');

//kategori
Route::get('/kategori', 'KategoriController@index');
Route::get('/kategori/{id}', 'KategoriController@show');
Route::post('/kategori', 'KategoriController@store');
Route::put('/kategori/{id}', 'KategoriController@update');

//logistik
Route::get('/logistik', 'LogistikController@index');
Route::get('/logistik/all', 'LogistikController@showAll');
Route::get('/logistik/{id}', 'LogistikController@show');
Route::post('/logistik', 'LogistikController@store');
Route::post('/logistik/search', 'LogistikController@search');
Route::put('/logistik/{id}', 'LogistikController@update');

//laporan
Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/all', 'LaporanController@showAll');
Route::get('/laporan/{id}', 'LaporanController@show');
Route::post('/laporan', 'LaporanController@store');
Route::post('/laporan/search', 'LaporanController@search');
Route::put('/laporan/{id}', 'LaporanController@update');

//bencana
Route::get('/bencana', 'BencanaController@index');
Route::get('/bencana/all', 'BencanaController@showAll');
Route::get('/bencana/{id}', 'BencanaController@show');
Route::post('/bencana', 'BencanaController@store');
Route::post('/bencana/search', 'BencanaController@search');
Route::put('/bencana/{id}', 'BencanaController@update');

//tim
Route::get('/tim', 'TimController@index');
Route::get('/tim/all', 'TimController@showAll');
Route::get('/tim/{id}', 'TimController@show');
Route::post('/tim', 'TimController@store');
Route::post('/tim/search', 'TimController@search');
Route::put('/tim/{id}', 'TimController@update');

//bantuan
Route::get('/bantuan', 'BantuanController@index');
Route::get('/bantuan/all', 'BantuanController@showAll');
Route::get('/bantuan/{id}', 'BantuanController@show');
Route::post('/bantuan', 'BantuanController@store');
Route::post('/bantuan/search', 'BantuanController@search');
Route::put('/bantuan/{id}', 'BantuanController@update');