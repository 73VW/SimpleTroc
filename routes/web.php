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

Route::get('/home', 'HomeController@index');


Route::get('/barters', 'BarterController@index');
Route::get('/barters/refuse/{barter}', 'BarterController@refuseDeal');
Route::get('/barters/close/{barter}', 'BarterController@closeDeal');
Route::get('/barters/abort/{barter}', 'BarterController@abortDeal');
Route::get('/barters/accept/{barter}', 'BarterController@acceptDeal');

Route::get('/talks/show/{talk}', 'TalkController@show');
Route::get('/talks/close/{talk}', 'TalkController@closeTalk');
Route::get('/talks/cancel/{talk}', 'TalkController@cancelTalk');


Route::post('/comments/hasRead/{talk}', 'CommentController@hasRead');
Route::post('/comments', 'CommentController@store');

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

    Route::prefix('barter')->group(function () {
        Route::post('create', 'BarterController@create');
        Route::post('store', 'BarterController@store');
    });
});

Route::prefix('checkout')->group(function () {
    //TODO : make the checkout
    Route::get('', 'CheckoutsController@index');
    Route::post('', 'CheckoutsController@charge');
});
