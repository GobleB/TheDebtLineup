<?php 

namespace App\Models;

use DB;

class Budget { 

    public $user_id;
    public $expenses;
    public $savings;
    public $invest;
    public $income;
    public $cash;

    private function update($x) {
        
        $sql = "
            UPDATE budget
            SET expenses = :expenses, savings = :savings, invest = :invest, income = :income, cash = :cash
            WHERE user_id = :id
            ";

        return DB::insert($sql, ["expenses"=>$x->expenses,"savings"=>$x->savings,"invest"=>$x->invest,"income"=>$x->income, "cash"=>$x->cash, "id"=>$x->user_id, ]);

    }

    public function save($x) {
        if (empty($x->user_id)) {
            $this->insert($x);
        } else {
            $this->update($x);
        }
    }

    public function get($x) {

        $sql = "
            SELECT * 
            FROM budget
            WHERE user_id = :id
            ";

        return DB::select($sql, ["id"=>$x]);
    }

}