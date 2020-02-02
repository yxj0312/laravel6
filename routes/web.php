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
use App\helpers;

use function App\flash;

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
    return view('testingvue.index');
});

Route::get('/session', function(){
    // get the session
    // return session('name', 'A default value');
    // Set a session
    session(['name' => 'JohnDoe']);
    // you can push the session to a array
    session(['name' => 'JohnDoe']);

    return view('welcome');
});

Route::get('/projects/create', function(){
    return view('projects.create');
});

Route::post('/projects', function(){
    // validate the project
    // save the project

    // Difference 1. store into the session, 2. stored in a single request.
    // session(['message' => 'Your Project has...']);
    // session()->flash('message', 'Your project has been created.');

    flash('Your project has been created.');

    return redirect('/');

    // you can also redirect it with a flash message
    return redirect('/')->with('message', 'Your project has been created.');
});

// // Helper function
// function flash($message) {
//     session()->flash('message', $message);
// }