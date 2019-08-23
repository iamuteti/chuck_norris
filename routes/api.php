<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', 'CategoryController@all')->name('categories');
Route::post('/categories', 'CategoryController@store')->name('category-api-create');
Route::match(['put', 'patch'], '/categories/{category}/edit', 'CategoryController@update')->name('category-update');
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('category-destroy');

Route::get('/jokes', 'JokeController@all')->name('jokes');
Route::get('/jokes/random', 'JokeController@random')->name('jokes-random');
Route::get('/jokes/{id}/category', 'JokeController@listByCategory')->name('jokes-by-category');
Route::post('/jokes', 'JokeController@store')->name('joke-api-create');
Route::match(['put', 'patch'], '/jokes/{joke}/edit', 'JokeController@update')->name('joke-update');
Route::delete('/jokes/{joke}', 'JokeController@destroy')->name('joke-destroy');

Route::get('/jurors', 'JurorController@all')->name('jurors');
Route::post('/jurors', 'JurorController@store')->name('juror-api-create');
Route::match(['put', 'patch'], '/jurors/{juror}/edit', 'JurorController@update')->name('juror-update');
Route::delete('/jurors/{juror}', 'JurorController@destroy')->name('juror-destroy');

Route::get('/votes', 'VoteController@all')->name('votes');
Route::post('/votes/create', 'VoteController@store')->name('vote-api-create');
Route::delete('/votes/{vote}', 'VoteController@destroy')->name('vote-destroy');

// Route::resource('categories', 'CategoryController');
// Route::resource('jokes', 'JokeController');
// Route::resource('jurors', 'JurorController');
// Route::resource('votes', 'VoteController');
