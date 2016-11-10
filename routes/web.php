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
	Route::post('{id}/questions/store', [
		'uses' 	=> 'ArticleQuestionsController@store',
		'as' 	=> 'questions.store'
	]);

	//Votes
	Route::get('{id}/questions/vote', [
		'uses' 	=> 'ArticleQuestionsController@vote',
		'as' 	=> 'questions.vote'
	]);


	Route::resource('tags','TagsController');
		Route::get('tags/{id}/destroy', [
			'uses' 	=> 'TagsController@destroy',
			'as' 	=> 'tags.destroy'
		]);
});