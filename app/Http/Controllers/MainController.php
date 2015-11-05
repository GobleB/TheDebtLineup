<?php

namespace App\Http\Controllers;

use Request;
use App\Models\User;
use App\Models\Budget;
use App\Models\Account;
use App\Models\Interest;
use DB;
use Carbon\Carbon;

class MainController extends Controller {
    
    public function login() {
    	try {

            $user = auth()->user();
            $accounts = Account::get_desc($user);
            $budget = Budget::get($user);
            $monthly_balance = [];
            $curMonth = 0;

            $current_balance = $this->get_total_balance($accounts);
            $total_balance = $this->get_total_balance($accounts);
            $type_totals = $this->totals_by_type($accounts);

            while($total_balance > 0) {

                $total_balance = 0;

                $remaining_budget = $budget->cash - $this->get_total_payments($accounts);

                foreach($accounts as $account) {

                    $interest = $this->calc_interest($account);

                    $payment = $this->get_payment($account, $remaining_budget);

                    $account->balance = $account->balance + $interest - $payment;
                    $total_balance = $total_balance + $account->balance;
                }

                $monthly_balance[$curMonth] = $total_balance;
                $curMonth++;
            }

            $months = (count($monthly_balance))-1;

            $payoff_date = \Carbon\Carbon::now()->addMonth($months)->format('m/Y');

            $monthly_balance = json_encode($monthly_balance);
            $type_totals = json_encode($type_totals);
            
			return view('/snapshot', ['user'=>$user, "current_balance"=>$current_balance, "payoff_date"=>$payoff_date,"monthly_balance"=>$monthly_balance, "type_totals"=>$type_totals]);

		} catch (PDOException $e) {
   			die($e->getMessage());
		}
    }

    private function get_total_balance($accounts){

        $total_balance = 0;
        foreach($accounts as $account) {
            $total_balance = $total_balance + $account->balance;
        }

        return $total_balance;

    }

    private function get_payment($account, &$remaining){

        $interest = $this->calc_interest($account);

        if(($account->balance + $interest) < $account->min_payment) {

            $payment = $account->balance + $interest;
           
        } else {
            if($remaining > 0) {

                if(($account->balance + $interest) >= ($account->min_payment + $remaining)) {
                    $payment = $account->min_payment + $remaining;
                    $remaining = 0;
                }
                else {

                    $payment = $account->balance + $interest;
                    $remaining = ($account->min_payment + $remaining) - ($account->balance + $interest);

                } 
            }
            else {
                $payment = $account->min_payment;
            }

        }

        return $payment;

    }

    private function calc_interest($account) {

        if($account->type == "card") {
            $period = 365;
        } else {
            $period = 12;
        }

        $a = ($account->rate / 100) /$period;
        $b = 1/12;
        $c = $period*$b;

        $interest = ($account->balance * pow((1+($a)),$c)) - $account->balance;

        return $interest;
    }

    

    private function get_total_payments($accounts) {
        $total_payments = 0;

        foreach($accounts as $account) {
            $total_payments = $total_payments + $account->min_payment;
        }

        return $total_payments;
    }

    private function totals_by_type($accounts) {

        $card = 0;
        $mortgage = 0; 
        $auto = 0;
        $student = 0;
        $other = 0;

        foreach($accounts as $account) {
            if ($account->type == "card") {
                $card = $card + $account->balance;
            } elseif ($account->type == "mortgage") {
                $mortgage = $mortgage + $account->balance;
            } elseif ($account->type == "auto") {
                $auto = $auto + $account->balance;
            } elseif ($account->type == "student") {
                $student = $student + $account->balance;
            } else {
                $other = $other + $account->balance;
            }
        }

        $type_Balances = ["card"=>$card,"mortgage"=>$mortgage,"auto"=>$auto,"student"=>$student,"other"=>$other];
    
        return $type_Balances;
    }

    public function get_schedule() {
        try {
            $user = auth()->user();
            $budget = Budget::get($user);
            $accounts = Account::get_desc($user);
            $remaining_budget = $budget->cash - $this->get_total_payments($accounts);

            $accounts_schedule = [];
            foreach($accounts as $account) {

                $interest = $this->calc_interest($account);

                $payment = $this->get_payment($account, $remaining_budget);
                $list_account = new Account();
                $list_account->name = $account->name;
                $list_account->min_payment = round($payment, 2);
                array_push($accounts_schedule, $list_account);
            }
             
            return view('/schedule', ["user"=>$user, "accounts"=>$accounts_schedule]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function get_settings() {
        try {
            $user = auth()->user();

            return view('/settings', ['user'=>$user]);  
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function set_settings() {
        try {
            $user = new User();
            $user->id = auth()->user()->id;
            $user->first_name = Request::input('first_name');
            $user->last_name = Request::input('last_name');
            $user->email = Request::input('email');
            $user->street = Request::input('street');
            $user->city = Request::input('city');
            $user->state = Request::input('state');
            $user->zip = Request::input('zip');
            $user->update($user);  

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function get_budget() {
        try {
            $user = auth()->user();
            $budget = Budget::get($user);
            
            return view('/budget', ["user"=>$user, "budget"=>$budget]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function set_budget() {
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

    public function get_accounts() {
        try {
            $user = auth()->user();
            $accounts = Account::get($user);

            return view('/accounts', ["user"=>$user, "accounts"=>$accounts]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function set_account() {
        try {
            $account = new Account();
            $account->user_id = auth()->user()->id;
            $account->name = Request::input('name');
            $account->type = Request::input('type');
            $account->rate = Request::input('rate');
            $account->balance = Request::input('balance');
            $account->min_payment = Request::input('min_payment');
            $account->save($account);

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete_account() {
        try {
            $account = new Account();
            $account->user_id = auth()->user()->id;
            $account->name = Request::input('name');
            $account->delete($account);

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


}
