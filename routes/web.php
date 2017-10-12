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

Route::prefix('/profile')->group(function () {

	//TODO : do the CRUD User
    Route::get('edit', 'ProfileController@edit');
    Route::put('', 'ProfileController@update');
    Route::delete('', 'ProfileController@delete');

    //TODO: do the CRUD products
    Route::prefix('products')->group(function () {
    	Route::get('', 'ProfileController@index');
    	Route::get('edit/{product}', 'ProductsController@edit');
    	Route::put('', 'ProductsController@update');
    	Route::delete('', 'ProductsController@delete');
	});


});


Route::prefix('checkout')->group(function () {
		//TODO : make some test
        Route::get('', 'CheckoutController@index');
		Route::post('', 'CheckoutController@charge');
});

