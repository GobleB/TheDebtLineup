<?php

use ...

class Registrar implements RegistrarContract {

	public function validator(array $data) {

		return Validator::make($data, [

			'first_name' => 'required|max255',
			'last_name' => 'required|max255',
			'email' => 'required|email|max255|unique:users',
			'password' => 'required|confirmed|min:8',
		]);
	}

	public function create(array $data) {

		return User::create([

			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),

		]);

	}

	
}