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

	//TODO : do the Delete User
	Route::get('', 'ProfilesController@index');
    Route::get('edit', 'ProfilesController@edit');
	Route::put('', 'ProfilesController@update');
    Route::delete('', 'ProfilseController@delete');


    //TODO: do the CRUD products
    Route::prefix('products')->group(function () {
    	Route::get('', 'ProductsController@index');
        Route::get('create', 'ProductsController@create');
        Route::get('edit/{product}', 'ProductsController@edit');
        Route::post('', 'ProductsController@store');
    	Route::put('', 'ProductsController@update');
    	Route::delete('', 'ProductsController@delete');
	});

});


Route::prefix('checkout')->group(function () {
		//TODO : make some test
        Route::get('', 'CheckoutsController@index');
		Route::post('', 'CheckoutsController@charge');
});

