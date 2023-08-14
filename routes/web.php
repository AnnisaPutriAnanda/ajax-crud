<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes.
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/data', function () {
//    return view('welcome');
//  });
// Route::get('user','App\Http\Controllers\CrudController@index');
// Route::get('user/json','App\Http\Controllers\CrudController@json');
// Route::resource('ajax',CrudController::class);
//
Route::GET('index','App\Http\Controllers\CrudController@index');
//
Route::GET('data','App\Http\Controllers\CrudController@yajra');
Route::MATCH(['get','post'], 'simpan','App\Http\Controllers\CrudController@store');
Route::DELETE('hapus/{id}','App\Http\Controllers\CrudController@destroy');
Route::GET('edit/{id}','App\Http\Controllers\CrudController@edit')->name('edit.edit');
Route::PUT('update/{id}','App\Http\Controllers\CrudController@update');
//
Route::GET('data2','App\Http\Controllers\ProdukController@yajra');
Route::MATCH(['get','post'], 'simpan2','App\Http\Controllers\ProdukController@store');
Route::DELETE('hapus2/{id}','App\Http\Controllers\ProdukController@destroy');
Route::GET('edit2/{id}','App\Http\Controllers\ProdukController@edit')->name('edit.edit');
Route::PUT('update2/{id}','App\Http\Controllers\ProdukController@update');
//
Route::GET('data3','App\Http\Controllers\ProductController@yajra');
Route::MATCH(['get','post'], 'simpan3','App\Http\Controllers\ProductController@store');
Route::DELETE('hapus3/{id}','App\Http\Controllers\ProductController@destroy');
Route::GET('edit3/{id}','App\Http\Controllers\ProductController@edit')->name('edit.edit');
Route::PUT('update3/{id}','App\Http\Controllers\ProductController@update');
//
Route::get('test', 'App\Http\Controllers\CrudController@redirect');
Route::get('test2', 'App\Http\Controllers\ProdukController@redirect');
Route::get('test3', 'App\Http\Controllers\ProductController@redirect');