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
	$list = App\Article::with('user')->orderBy('created_at', 'desc')
            ->paginate(15);
    return view('welcome')->with(['articles' => $list]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
