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

Route::get('/', 'ShopController@index')->name('get.shop');

Route::resource('product', 'ProductController');
Route::post('item', 'OrderItemController@store')->name('item.store');
Route::get('cart', 'OrderItemController@index')->name('get.cart');
Route::get('pay', 'OrderItemController@pay')->name('product.pay');
Route::get('clear', 'OrderItemController@clear')->name('product.clear');
Route::get('orders', 'OrderController@index')->name('order.list');
Route::get('view/{order}', 'OrderController@show')->name('order.view');