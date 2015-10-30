<?php

namespace App\Http\Controllers;

use Request;
use App\Models\User;
use App\Models\Budget;
use App\Models\Account;
use DB;

class MainController extends Controller {
    
    public function login() {
    	try {
            $user = auth()->user();
			return view('/snapshot', ['user'=>$user]);	
		} catch (PDOException $e) {
   			die($e->getMessage());
		}
    }


    public function getSettings() {
        try {
            $user = auth()->user();
            return view('/settings', ['user'=>$user]);  
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function setSettings() {
        try {
            $user = new User();
            $user->id = auth()->user()->id;
            $user->first_name = Request::input('first_name');
            $user->last_name = Request::input('last_name');
            $user->email = Request::input('email');

            $pInput = Request::input('password');
            if($pInput > 15) {
                $user->password = $pInput;
            } else {
                $pInput = bcrypt($pInput);
                $user->password = $pInput;
            }

            $user->street = Request::input('street');
            $user->city = Request::input('city');
            $user->state = Request::input('state');
            $user->zip = Request::input('zip');
            $user->save($user);  

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getBudget() {
        try {
            $user = auth()->user();
            $budget = new Budget();
            $budget->get($user->id);

            return view('/budget', ["user"=>$user, "budget"=>$budget]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function setBudget() {
        try {
            $budget = new Budget();
            $budget->user_id = auth()->user()->id;
            $budget->expenses = Request::input('expenses');
            $budget->savings = Request::input('savings');
            $budget->invest = Request::input('invest');
            $budget->income = Request::input('income');

            function cash($x){
                $total = $x->expenses + $x->savings + $x->invest;
                if($total < $x->income) {
                    return $x->income - $total;
                } else {
                    return 0.00;
                }
            }

            $budget->cash = cash($budget);

            $budget->save($budget);  

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
