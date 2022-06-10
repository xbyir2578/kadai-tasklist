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

//タスクリスト
Route::get('/', 'TasksController@index');
Route::get('tasks/create', 'TasksController@create')->name('tasks.create');
Route::post('tasks', 'TasksController@store')->name('tasks.store');
Route::put('tasks/{id}', 'TasksController@update')->name('tasks.update');
Route::delete('tasks/{id}', 'TasksController@destroy')->name('tasks.destroy');
Route::get('tasks', 'TasksController@index')->name('tasks.index');
Route::get('tasks/{id}', 'TasksController@show')->name('tasks.show');
Route::get('tasks/{id}/edit', 'TasksController@edit')->name('tasks.edit');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//認証済みのユーザ
Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', 'TasksController', ['only' => ['store', 'destroy']]);
});