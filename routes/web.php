<?php


Auth::routes();
Route::get('/index', 'HomeController@index')->name('home');

Route::get('/welcome', function () {
	return view('/welcome');
});

Route::post('/follow/{user}','FollowsController@store');

Route::get('/','PostsController@index');
Route::get('/profile/{user}/edit', 'ProfilesController@edit');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profiles.show');
route::post('/search', 'SearchController@store');
Route::patch('/profile/{user}', 'ProfilesController@update');

Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show'); 



