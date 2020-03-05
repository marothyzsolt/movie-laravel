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

Route::group(['middleware' => ['can:delete,rating'], 'prefix' => 'users/ratings/{rating}/delete', 'as' => 'users.ratings.delete'],function() {
    Route::get('/', 'RatingController@destroy');
    Route::get('force', 'RatingController@forceDelete')->name('.force');
    Route::get('restore', 'RatingController@restore')->name('.restore');
});

Route::post('users/movies/save', 'UserController@store')->name('users.movies.save');

Route::get('movies/search', 'MovieController@index')->name('movies.index');
Route::post('movies/search', 'MovieController@search')->name('movies.search');

\Illuminate\Support\Facades\Auth::routes();
