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

Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('login', 'AuthController@postLogin')->name('auth.postLogin');
Route::post('register', 'AuthController@postRegister')->name('auth.postRegister');

Route::get('/', 'GameController@index')->name('game.index');
Route::get('get-words', 'GameController@getWords')->name('game.word');
Route::post('check-answer', 'GameController@checkAnswer')->name('game.answer');
