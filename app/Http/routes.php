<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('/home');
});

Route::post('/signUp', 'MainController@newUser');

Route::get('/snapshot', function() {
	return view('snapshot');
});
Route::get('/schedule', function() {
	return view('schedule');
});
Route::get('/accounts', function() {
	return view('accounts');
});
Route::get('/budget', function() {
	return view('budget');
});
Route::get('/settings', function() {
	return view('settings');
});

