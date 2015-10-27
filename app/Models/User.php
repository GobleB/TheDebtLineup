<?php 

namespace App\Models;

use DB;

class User {

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $street_address;
	public $city;
	public $state;
	public $zip_code;
	public $age;

    public static function addUser($email, $password) {

    	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    	DB::INSERT($sql, ['email'=>$email, 'password'=>$password]);
	
    }

    /**
     * Create
     */
    public function find($email) {

    	$sql = "SELECT * FROM users WHERE email = :email";
    	DB::SELECT($sql, ['email'=>$email]);

    }

}