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

Route::get('/', [
	'uses' 	=> 'HomeController@index',
	'as' 	=> 'home.index'
]);

Route::get('/home', [
	'uses' 	=> 'HomeController@index',
	'as' 	=> 'home.index'
]);

//Route::group(['prefix' => '/', 'middleware' => 'auth'], function(){
Route::group(['prefix' => '/'], function(){

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

	Route::resource('subjects','SubjectsController');
		Route::get('subjects/{id}/destroy', [
			'uses' 	=> 'SubjectsController@destroy',
			'as' 	=> 'subjects.destroy'
	]);


	Route::resource('topics','TopicsController');
		Route::get('topics/{id}/destroy', [
			'uses' 	=> 'TopicsController@destroy',
			'as' 	=> 'topics.destroy'
		]);

	Route::resource('articles','ArticlesController');
		Route::get('articles/{id}/destroy', [
			'uses' 	=> 'ArticlesController@destroy',
			'as' 	=> 'articles.destroy'
		]);

	//Questions
	Route::get('{id}/questions/store', [
		'uses' 	=> 'ArticleQuestionsController@store',
		'as' 	=> 'questions.store'
	]);


	Route::resource('tags','TagsController');
		Route::get('tags/{id}/destroy', [
			'uses' 	=> 'TagsController@destroy',
			'as' 	=> 'tags.destroy'
		]);
});