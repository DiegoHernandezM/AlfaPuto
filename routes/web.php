<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::bind('product', function($slug){
    return App\Products::where('slug', $slug)->first();
});


Route::get('/', [
	'as' => 'index',
	'uses' => 'StoreController@index'
	]);

Route::get('/questions', [
	'as' => 'questions',
	'uses' => 'StoreController@questions'
	]);

Route::get('/about', [
	'as' => 'about',
	'uses' => 'StoreController@about'
	]);

Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'StoreController@contact'
	]);
Route::get('/mapsite', [
	'as' => 'mapsite',
	'uses' => 'StoreController@mapsite'
	]);

Route::get('/privacy', [
	'as' => 'privacy',
	'uses' => 'StoreController@privacy'
	]);
Route::get('product/{slug}', [
	'as' => 'product-detail',
	'uses' => 'StoreController@show'
	]);

// Carrito -------------

Route::get('cart/show', [
		'as' => 'cart-show',
		'uses' => 'CartController@show'
]);

Route::get('cart/add/{product}', [
		'as' => 'cart-add',
		'uses' => 'CartController@add'
]);

Route::get('cart/delete/{product}',[
		'as' => 'cart-delete',
		'uses' => 'CartController@delete'
]);

Route::get('cart/trash', [
		'as' => 'cart-trash',
		'uses' => 'CartController@trash'
]);

Route::get('cart/update/{product}/{quantity}', [
    'as' => 'cart-update',
    'uses' => 'CartController@update'
]);

Route::get('order-detail', [
		'middleware' => 'auth',
		'as' => 'order-detail',
		'uses' => 'CartController@orderDetail'
]);

// Authentication routes...
Route::get('auth/login', [
    'as' => 'login-get',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('auth/login', [
    'as' => 'login-post',
    'uses' => 'Auth\LoginController@postLogin'
]);

Route::get('auth/logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@getLogout'
]);

// Registration routes...
Route::get('auth/register', [
    'as' => 'register-get',
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('auth/register', [
    'as' => 'register-post',
    'uses' => 'Auth\AuthController@postRegister'
]);


Auth::routes();

Route::get('/home', 'HomeController@index');
