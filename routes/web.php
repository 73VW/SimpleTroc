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

Route::get('/home', 'HomeController@index');

Route::prefix('/profile')->group(function () {

    //TODO : do the Delete User
    Route::get('', 'ProfilesController@index');
    Route::get('edit', 'ProfilesController@edit');
    Route::put('', 'ProfilesController@update');
    Route::delete('{user}', 'ProfilseController@destroy');

    Route::prefix('products')->group(function () {
        Route::get('', 'ProductsController@index');
        Route::get('create', 'ProductsController@create');
        Route::get('edit/{product}', 'ProductsController@edit');
        Route::get('edit/image/{product}', 'ProductsController@manageImg');
        Route::post('', 'ProductsController@store');
        Route::put('{product}', 'ProductsController@update');
        Route::delete('{product}', 'ProductsController@destroy');
    });

    //TODO: the user can manage the picture
    Route::prefix('pictures')->group(function () {
        Route::post('{product}', 'PicturesController@store');
        Route::delete('{picture}', 'PicturesController@destroy');
    });
});

Route::prefix('checkout')->group(function () {
    //TODO : make the checkout
    Route::get('', 'CheckoutsController@index');
    Route::post('', 'CheckoutsController@charge');
});
