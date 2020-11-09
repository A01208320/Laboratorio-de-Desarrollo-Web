<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('administrator', function () {
    return 'you are administrator';
})->middleware([
    'auth', 'auth.Administrator'
]);

Route::get('registeredUser', function () {
    return 'you are registeredUser';
})->middleware([
    'auth', 'auth.RegisteredUser'
]);

Route::resource("/titles", "TitleController")->except('show');

Route::resource("/reviews", "ReviewController")->middleware([
    'auth', 'auth.RegisteredUser'
]);
Route::get("/titles/{title}/confirm", "TitleController@confirm")->name('titles.confirm')->middleware(['auth', 'auth.Administrator']);

Route::get("/reviews/{review}/confirm", "ReviewController@confirm")->name('reviews.confirm')->middleware(['auth', 'auth.RegisteredUser']);

Route::resource("/igdb", "IGDBController");
