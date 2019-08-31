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
    return view('home');
});

Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::post('/products/store', 'ProductsController@store');
Route::get('/products/{id}', 'ProductsController@show')->name('productShow');
Route::post('/products/destroy/{id}', 'ProductsController@destroy');
Route::get('/products/edit/{id}', 'ProductsController@edit');
Route::post('/products/{id}', 'ProductsController@update');


Route::get('/faq', function () {
    return view('faq');
});

Route::get('/categoria/{id}/{name}', 'ProductsController@category');


Route::get('cart', 'CartsController@show')->middleware('carrito');

Route::get('add-to-cart/{id}', 'CartsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'usuarioAdmin'], function () {
    Route::get('/usuarioAdmin/series', 'Admin\SeriesController@index');
    Route::get('/usuarioAdmin/series/{id}', 'Admin\SeriesController@edit');
});
