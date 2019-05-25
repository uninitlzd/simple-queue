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
    Route::post('/unit', 'UnitController@store')->name('store');
    Route::get('/unit/{id}/edit', 'UnitController@edit')->name('edit');
    Route::put('/unit/{id}', 'UnitController@update')->name('update');
    Route::delete('/unit/{id}', 'UnitController@destroy')->name('delete');
});
Route::name('doctor.')->group(function (){
    Route::get('/doctor','DoctorController@index')->name ('index');
    Route::get('/doctor/create', 'DoctorController@create')->name('create');
    Route::post('/doctor', 'DoctorController@store')->name('store');
    Route::get('/doctor/{id}/edit', 'DoctorController@edit')->name('edit');
    Route::put('/doctor/{id}', 'DoctorController@update')->name('update');
    Route::delete('/doctor/{id}', 'DoctorController@destroy')->name('delete');
});

Route::name('patient.')->group(function (){
    Route::get('/patient','PatientController@index')->name ('index');
    Route::get('/patient/create', 'PatientController@create')->name('create');
    Route::post('/patient', 'PatientController@store')->name('store');
    Route::get('/patient/{id}/edit', 'PatientController@edit')->name('edit');
    Route::put('/patient/{id}', 'PatientController@update')->name('update');
    Route::delete('/patient/{id}', 'PatientController@destroy')->name('delete');
});