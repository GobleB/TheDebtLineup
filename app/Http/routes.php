<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

Route::get('/', function () {
    return view('/home');
});

Route::get('/snapshot', ['middleware' => 'auth',
    'uses' => 'MainController@login']);

Route::get('/schedule', ['middleware' => 'auth', 'uses'=>'MainController@get_schedule']);

Route::get('/accounts', ['middleware' => 'auth', 'uses'=>'MainController@get_accounts']);
Route::post('/accounts',['middleware' => 'auth', 'uses'=> 'MainController@set_account']);
Route::post('/accounts/delete', ['middleware' => 'auth', 'uses'=> 'MainController@delete_account']);

Route::get('/budget', ['middleware' => 'auth', 'uses' => 'MainController@get_budget']);
Route::post('/budget', ['middleware' => 'auth', 'uses' => 'MainController@set_budget']);

Route::get('/settings', ['middleware' => 'auth', 'uses' =>'MainController@get_settings']);
Route::post('/settings', ['middleware' => 'auth', 'uses' =>'MainController@set_settings']);



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