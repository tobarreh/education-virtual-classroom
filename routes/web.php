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

	// Errors
	Route::get('errors/store', [
		'uses' 	=> 'ReportErrorsController@store',
		'as' 	=> 'errors.store'
	]);

	// Users
	Route::resource('users','UsersController');
		Route::get('users/{id}/destroy', [
			'uses' 	=> 'UsersController@destroy',
			'as' 	=> 'users.destroy'
		]);

	// Categories
	Route::resource('categories','CategoriesController');
		Route::get('categories/{id}/destroy', [
			'uses' 	=> 'CategoriesController@destroy',
			'as' 	=> 'categories.destroy'
		]);

	// Grades
	Route::resource('grades','GradesController');
		Route::get('grades/{id}/destroy', [
			'uses' 	=> 'GradesController@destroy',
			'as' 	=> 'grades.destroy'
		]);

	// Matters
	Route::resource('matters','MattersController');
		Route::get('matters/{id}/destroy', [
			'uses' 	=> 'MattersController@destroy',
			'as' 	=> 'matters.destroy'
		]);

	// Subjects
	Route::resource('subjects','SubjectsController');
		Route::get('subjects/{id}/destroy', [
			'uses' 	=> 'SubjectsController@destroy',
			'as' 	=> 'subjects.destroy'
		]);

	// Topics
	Route::resource('topics','TopicsController');
		Route::get('topics/{id}/destroy', [
			'uses' 	=> 'TopicsController@destroy',
			'as' 	=> 'topics.destroy'
		]);

	// Articles
	Route::resource('articles','ArticlesController');
		Route::get('articles/{id}/destroy', [
			'uses' 	=> 'ArticlesController@destroy',
			'as' 	=> 'articles.destroy'
		]);

	// Questions
	Route::get('article/{id}/question/store', [
		'uses' 	=> 'ArticleQuestionsController@store',
		'as' 	=> 'question.store'
	]);

	Route::get('question/{id}/destroy', [
		'uses' 	=> 'ArticleQuestionsController@destroy',
		'as' 	=> 'question.destroy'
	]);

	Route::get('question/{id}/answer/store', [
		'uses' 	=> 'ArticleQuestionAnswersController@store',
		'as' 	=> 'question.answer.store'
	]);

	Route::get('question/answer/{id}/destroy', [
		'uses' 	=> 'ArticleQuestionAnswersController@destroy',
		'as' 	=> 'question.answer.destroy'
	]);

	Route::get('question/{id}/vote/{vote}', [
		'uses' 	=> 'ArticleQuestionsController@vote',
		'as' 	=> 'questions.vote'
	]);

	Route::get('question/{question_id}/answer/{answer_id}/vote/{vote}', [
		'uses' 	=> 'ArticleQuestionAnswersController@vote',
		'as' 	=> 'question.answer.vote'
	]);

	// Comments
	Route::get('article/{id}/comment/store', [
		'uses' 	=> 'ArticleCommentsController@store',
		'as' 	=> 'comment.store'
	]);

	Route::get('comment/{id}/destroy', [
		'uses' 	=> 'ArticleCommentsController@destroy',
		'as' 	=> 'comment.destroy'
	]);

	Route::get('comment/{id}/answer/store', [
		'uses' 	=> 'ArticleCommentAnswersController@store',
		'as' 	=> 'comment.answer.store'
	]);

	Route::get('comment/answer/{id}/destroy', [
		'uses' 	=> 'ArticleCommentAnswersController@destroy',
		'as' 	=> 'comment.answer.destroy'
	]);

	Route::get('comment/{id}/vote/{vote}', [
		'uses' 	=> 'ArticleCommentsController@vote',
		'as' 	=> 'comment.vote'
	]);

	Route::get('comment/{comment_id}/answer/{answer_id}/vote/{vote}', [
		'uses' 	=> 'ArticleCommentAnswersController@vote',
		'as' 	=> 'comment.answer.vote'
	]);

	// Tags
	Route::resource('tags','TagsController');
		Route::get('tags/{id}/destroy', [
			'uses' 	=> 'TagsController@destroy',
			'as' 	=> 'tags.destroy'
		]);
});