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

Route::get('/', 'HomeController@index')->name('main');
Route::get('users/ratings', 'RatingController@index');

Route::get('users/ratings/{rating}/delete', 'RatingController@destroy')
    ->name('users.ratings.delete');
    //->middleware('can:delete,rating');

Route::get('users/ratings/{rating}/delete/force', 'RatingController@forceDelete')
    ->name('users.ratings.delete.force');
Route::get('users/ratings/{rating}/delete/restore', 'RatingController@restore')
    ->name('users.ratings.delete.restore');

Route::post('users/movies/save', 'UserController@store')->name('users.movies.save');

Route::get('movies/search', 'MovieController@index')->name('movies.index');
Route::post('movies/search', 'MovieController@search')->name('movies.search');

\Illuminate\Support\Facades\Auth::routes();
