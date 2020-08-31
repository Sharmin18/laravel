<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
	return view('welcome');
});

Route::middleware(['auth'])->group(function(){
	Route::get('/tasks', 'TaskController@index')->name('tasks');
	Route::get('/tasks/create', 'TaskController@create');
	Route::post('/tasks/store', 'TaskController@store');

	Route::get('/tasks/edit/{id}', 'TaskController@edit');
	Route::post('/tasks/update/{id}', 'TaskController@update');

	Route::get('/tasks/delete/{id}', 'TaskController@destroy');

	Route::post('/tasks/toggle/{id}', 'TaskController@toggle');
});


Route::get('/join', 'JoinController@create');
Route::post('/join', 'JoinController@store');

Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store')->name('login');

Route::get('/logout', 'LoginController@destroy')->name('logout');