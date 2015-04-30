<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

// Provide controller methods with object instead of ID
Route::model('tasks', 'Task');
Route::model('articles', 'Article');
Route::model('projects', 'Project');
Route::model('users', 'User');
 
// Use slugs rather than IDs in URLs
Route::bind('tasks', function($value, $route) {
	return App\Task::whereSlug($value)->first();
});

Route::bind('articles', function($value, $route) {
	return App\Article::whereSlug($value)->first();
});

Route::bind('projects', function($value, $route) {
	return App\Project::whereSlug($value)->first();
});

// Use username rather than IDs in URLs
Route::bind('users', function($value, $route) {
	return App\User::whereUsername($value)->first();
});

Route::resource('users', 'UsersController');

Route::resource('users.projects', 'ProjectsController');

Route::resource('users.projects.tasks', 'TasksController');

Route::resource('users.projects.articles', 'ArticlesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
