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

use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/post/{post}', 'PostsController@show');

Route::get('/about', function () {
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/{article}', 'ArticlesController@show');
Route::get('testingvue', function () {
    return view('testingvue.index')
});