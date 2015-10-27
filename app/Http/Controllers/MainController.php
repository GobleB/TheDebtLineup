<?php

namespace App\Http\Controllers;

use Request;
use App\Models\User;
use DB;

class MainController extends Controller {
    
    public function newUser() {

    	try {

    		$email = $_POST["email"];
    		$password = $_POST["password"];

    		User::addUser($email, $password);

    		$user = new User();
    		$user->find($email);

			return view('/accounts', ['user'=>$user]);	
		} catch (PDOException $e) {
   			die($e->getMessage());
		}
    }

}
