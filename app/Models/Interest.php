<?php 

namespace App\Models;

use DB;

class Interest {

	public $t_balance;
	public $n_balance;
	public $months;
	public $a_payment;

	static public function add_payment($cash, $min_total) {
		$add =  $cash - $min_total;
		return $add;
	}

	static public function payment($balance, $min_payment, $a_payment) {
		$pay = $min_payment + $a_payment;
		if($balance<$pay) {
			return $x;
		} else {
			return $pay;
		}
	}

	
}