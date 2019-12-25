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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', 'ProfilesController@index')->name('post.index');

	Route::get('/create', 'PostsController@create')->name('post.create');

	Route::post('/store', 'PostsController@store')->name('post.store');

	Route::get('/delete/{id}', 'PostsController@destroy')->name('post.destroy');

	Route::get('/createprofile', 'ProfilesController@create')->name('profile.create');

	Route::post('/storeprofile', 'ProfilesController@store')->name('profile.store');
});
