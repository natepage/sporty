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

Route::auth();

Route::get('/', 'HomeController@index');

Route::resource('measurements', 'MeasurementsController');

Route::get('/measurements/remove/remind', 'MeasurementsController@removeRemind')->name('measurements.remove.remind');

Route::resource('level', 'LevelController');

Route::resource('workout', 'WorkoutController');

Route::get('/workout/set/level/{id}', 'WorkoutController@setLevelAction')
    ->where(['id' => '[0-9]+'])
    ->name('workout.set_level');
