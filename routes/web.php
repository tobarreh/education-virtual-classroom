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

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/', 'middleware' => 'auth'], function(){

	Route::get('home', [
		'uses' 	=> 'HomeController@index',
		'as' 	=> 'home.index'
	]);

	Route::resource('users','UsersController');
		Route::get('users/{id}/destroy', [
			'uses' 	=> 'UsersController@destroy',
			'as' 	=> 'users.destroy'
	]);

	Route::resource('categories','CategoriesController');
		Route::get('categories/{id}/destroy', [
			'uses' 	=> 'CategoriesController@destroy',
			'as' 	=> 'categories.destroy'
	]);
});