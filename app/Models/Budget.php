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

    // private function __construct($user_id, $expenses, $savings, $invest, $income, $cash) {
    //     $this->user_id = $user_id;
    //     $this->expenses = $expenses;
    //     $this->savings = $savings;
    //     $this->invest = $invest;
    //     $this->income = $income;
    //     $this->cash = $cash;
    // }

    private function insert($x) {

        $sql = "
            INSERT INTO budget (user_id, expenses, savings, invest, income, cash)
            VALUES (:user_id, :expenses, :savings, :invest, :income, :cash)
            ";

        return DB::insert($sql, ["user_id"=>$x->user_id,"expenses"=>$x->expenses,"savings"=>$x->savings,"invest"=>$x->invest,"income"=>$x->income,"cash"=>$x->cash]);

    }

    private function update($x) {
        
        $sql = "
            UPDATE budget
            SET expenses = :expenses, savings = :savings, invest = :invest, income = :income, cash = :cash
            WHERE user_id = :id
            ";

        return DB::insert($sql, ["expenses"=>$x->expenses,"savings"=>$x->savings,"invest"=>$x->invest,"income"=>$x->income, "cash"=>$x->cash, "id"=>$x->user_id, ]);

    }

    public function save($budget) {

        $sql = "
        SELECT * 
        FROM budget
        WHERE user_id = :id
        ";

        $row = DB::selectOne($sql, ["id"=>$budget->user_id]);
        
        if (empty($row)) {
            $this->insert($budget);
        } else {
            $this->update($budget);
        }
    }

    static public function get($user) {

        $budget = new Budget();

        $sql = "
                SELECT * 
                FROM budget
                WHERE user_id = :id
                ";

        $row = DB::selectOne($sql, ["id"=>$user->id]);
        
        if (!empty($row)) {            

            $budget->user_id = $row->user_id;
            $budget->expenses = $row->expenses;
            $budget->savings = $row->savings;
            $budget->invest = $row->invest;
            $budget->income = $row->income;
            $budget->cash = $row->cash;

        }
        
        return $budget;
    }
}