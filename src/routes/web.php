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
	return redirect(route('article.index'));
});

Auth::routes();

Route::resource('article', 'ArticleController');

Route::get('/home', 'HomeController@index')->name('home');

// home
Route::prefix('home')->namespace('Home')->group( function () {
	Route::resource('my-article', 'ArticleController');
	Route::resource('tag', 'TagController');
});