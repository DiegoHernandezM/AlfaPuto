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

Route::get('/', [
	'as' => 'home',
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