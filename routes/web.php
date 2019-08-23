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
    return view('welcome');
});

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/create', 'CategoryController@create')->name('category-create');
Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('category-edit');

Route::get('/jokes', 'JokeController@index')->name('jokes');
Route::get('/jokes/create', 'JokeController@create')->name('joke-create');
Route::get('/jokes/{joke}/edit', 'JokeController@edit')->name('joke-edit');
Route::get('/jokes/{id}/category', 'JokeController@byCategory')->name('joke-category');

Route::get('/jurors', 'JurorController@index')->name('jurors');
Route::get('/jurors/create', 'JurorController@create')->name('juror-create');
Route::get('/jurors/{juror}/edit', 'JurorController@edit')->name('juror-edit');

Route::get('/votes', 'VoteController@index');
Route::get('/votes/create', 'VoteController@create');
