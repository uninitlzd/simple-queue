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

Route::get('/home', 'HomeController@index')->name('home');

Route::name('unit.')->group(function () {
    Route::get('/unit', 'UnitController@index')->name('index');
    Route::get('/unit/create', 'UnitController@create')->name('create');
    Route::get('/unit/{id}/edit', 'UnitController@edit')->name('edit');
    Route::post('/unit', 'UnitController@store')->name('store');
    Route::put('/unit/{id}', 'UnitController@update')->name('update');
    Route::delete('/unit/{id}', 'UnitController@destroy')->name('delete');
});
