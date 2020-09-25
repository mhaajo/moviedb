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
Auth::routes();

Route::get('/', 'WelcomeController@index')->name('welcome.index');
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/users/own', 'UserController@showOwn')->name('user.showOwn');
    Route::get('/users/editOwn', 'UserController@editOwn')->name('user.editOwn');
    Route::put('/users/updateOwn/{id}', 'UserController@updateOwn')->name('user.updateOwn');
    Route::get('/movies', 'MovieController@index')->name('movie.index');
    Route::get('/movies/own', 'MovieController@indexOwn')->name('movie.indexOwn');
    Route::get('/movies/create', 'MovieController@create')->name('movie.create');
    Route::post('/movies', 'MovieController@store')->name('movie.store');
    Route::delete('/movies/{id}', 'MovieController@destroy')->name('movie.destroy');
    Route::get('/movies/{id}', 'MovieController@show')->name('movie.show');
    Route::get('/movies/{id}/edit', 'MovieController@edit')->name('movie.edit');
    Route::put('/movies/{id}', 'MovieController@update')->name('movie.update');
});

Route::middleware(['auth','auth.admin'])->group(function() {
    Route::get('/users/editOwnAdmin', 'UserController@editOwnAdmin')->name('user.editOwnAdmin');
    Route::put('/users/updateOwnAdmin/{id}', 'UserController@updateOwnAdmin')->name('user.updateOwnAdmin');
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::delete('/users/{id}', 'UserController@destroy')->name('user.destroy');
    Route::get('/users/{id}', 'UserController@show')->name('user.show');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/users/{id}', 'UserController@update')->name('user.update');
});





