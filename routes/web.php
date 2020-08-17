<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TaskController@index')->name('home');

Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks/store', 'TaskController@store');

Route::get('/tasks/edit/{id}', 'TaskController@edit');
Route::post('/tasks/update/{id}', 'TaskController@update');

Route::get('/tasks/delete/{id}', 'TaskController@destroy');

Route::post('/tasks/toggle/{id}', 'TaskController@toggle');

