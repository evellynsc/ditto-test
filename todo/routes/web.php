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


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', 'SessionsController@store');
Route::post('/logout', 'SessionsController@destroy');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'TasksController@index');
});

Route::get('/tasks', 'TasksController@index')->name('home');
Route::get('/tasks/create', 'TasksController@create');
Route::post('/tasks', 'TasksController@store');
Route::get('/tasks/{id}', 'TasksController@show');
Route::patch('/tasks/done/{id}', 'TasksController@done');
