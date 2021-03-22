<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/anasayfa','homeController@index')->name('anasayfa');

//Ürün
Route::get('/products','homeController@products')->name('products');
Route::post('/productCreate','homeController@productcreate')->name('productCreate');

// Stok
Route::get('/stockview/{id}','homeController@stockView')->name('stockview');
Route::post('/stockupdate/{id}','homeController@stockUpdate')->name('stockupdate');
Route::post('/stockdelete/{id}','homeController@stockDelete')->name('stockdelete');
