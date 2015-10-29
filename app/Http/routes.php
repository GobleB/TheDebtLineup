<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
	return view('accounts',['id'=>Auth::user()->id]);
});
Route::get('/budget', function() {
	return view('budget');
});
Route::get('/settings', function() {
	return view('settings');
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');