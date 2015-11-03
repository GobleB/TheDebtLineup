<?php

namespace App\Models;

use DB;

class Account {

	public $user_id;
	public $name;
	public $type;
	public $balance;
	public $rate;
	public $min_payment;

	private function insert($account) {

        $sql = "
            INSERT INTO accounts (user_id, name, type, balance, rate, min_payment)
            VALUES (:user_id, :name, :type, :balance, :rate, :min_payment)
            ";

        return DB::insert($sql, ["user_id"=>$account->user_id, "name"=>$account->name, "type"=>$account->type, "balance"=>$account->balance, "rate"=>$account->rate, "min_payment"=>$account->min_payment]);

    }

    private function update($account) {
        
        $sql = "
            UPDATE accounts
            SET name = :name, type = :type, balance = :balance, rate = :rate, min_payment = :min_payment
            WHERE user_id = :id and name = :name2
            ";

        return DB::insert($sql, ["name"=>$account->name,"name2"=>$account->name,"type"=>$account->type,"balance"=>$account->balance,"rate"=>$account->rate, "min_payment"=>$account->min_payment, "id"=>$account->user_id, ]);

    }

    public function save($account) {

        $sql = "
        SELECT * 
        FROM accounts
        WHERE user_id = :id AND name = :name
        ";

        $row = DB::selectOne($sql, ["id"=>$account->user_id, "name"=>$account->name]);
        
        if (empty($row)) {
            $this->insert($account);
        } else {
            $this->update($account);
        }
    }

    static public function get($user) {

        $accounts = [];

        $sql = "
            SELECT * 
            FROM accounts
            WHERE user_id = :id
            ";

        $rows = DB::select($sql, ["id"=>$user->id]);
        
        if (!empty($rows)) { 

        	foreach($rows as $row) {           
        	$account = new Account();
            $account->user_id = $row->user_id;
            $account->name = $row->name;
            $account->type = $row->type;
            $account->balance = $row->balance;
            $account->rate = $row->rate;
            $account->min_payment = $row->min_payment;

            array_push($accounts, $account);
        	}
        }
        
        return $accounts;
    }

    static public function get_desc($user) {

        $accounts = [];

        $sql = "
            SELECT * 
            FROM accounts
            WHERE user_id = :id
            ORDER BY balance
            ";

        $rows = DB::select($sql, ["id"=>$user->id]);
        
        if (!empty($rows)) { 

            foreach($rows as $row) {           
            $account = new Account();
            $account->user_id = $row->user_id;
            $account->name = $row->name;
            $account->type = $row->type;
            $account->balance = $row->balance;
            $account->rate = $row->rate;
            $account->min_payment = $row->min_payment;

            array_push($accounts, $account);
            }
        }
        
        return $accounts;
    }

    static public function delete($account) {

        $sql = "
            DELETE FROM accounts
            WHERE user_id = :user_id
            AND name = :name 
            ";

        return DB::DELETE($sql, ["name"=>$account->name, "user_id"=>$account->user_id]);
    }

}