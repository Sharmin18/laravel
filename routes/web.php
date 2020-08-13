<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TaskController@index')->name('home');

Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks/store', 'TaskController@store');

Route::post('/tasks/toggle/{id}', 'TaskController@toggle');

