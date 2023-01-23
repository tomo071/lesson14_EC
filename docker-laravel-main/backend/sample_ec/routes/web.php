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

Route::get('/top', 'ShopController@top')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/message', function () {
        return view('message');
    })->name('message');

    Route::get('/export', 'ShopController@export')->name('export');

    Route::resource('/products', 'ProductController');

    Route::resource('/shops', 'ShopController');

    Route::get('/shop/my_page', 'ShopController@my_page')->name('shop.my_page');

});