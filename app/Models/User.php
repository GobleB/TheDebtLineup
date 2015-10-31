<?php 

namespace App\Models;

use DB;

class User { 

    public function update($user) {
        
        $sql = "
            UPDATE users
            SET first_name = :first_name, last_name = :last_name, email = :email, street = :street, city = :city, state = :state, zip = :zip
            WHERE id = :id
            ";

        return DB::insert($sql, ["first_name"=>$user->first_name,"last_name"=>$user->last_name,"email"=>$user->email, "street"=>$user->street, "city"=>$user->city, "state"=>$user->state, "zip"=>$user->zip, "id"=>$user->id]);

    }

    // private function insert($x) {

    //     $sql = "
    //         INSERT INTO users (first_name, last_name, email, city, state, zip)
    //         VALUES (:first_name, :last_name, :email, :city, :state, :zip)
    //         WHERE id = :id
    //         ";

    //     return DB::insert($sql, ["user_id"=>$x->user_id,"expenses"=>$x->expenses,"savings"=>$x->savings,"invest"=>$x->invest,"income"=>$x->income,"cash"=>$x->cash]);

    // }

    // public function save($x) {
    //     if (empty($x->id)) {
    //         $this->insert($x);
    //     } else {
    //         $this->update($x);
    //     }
    // }

    static public function get($id) {

        $user = new User();

        $sql = "
                SELECT * 
                FROM users
                WHERE id = :id
                ";

        $row = DB::selectOne($sql, ["id"=>$id]);           


        print_r($row);
        $user->id = $row->id;
        $user->first_name = $row->first_name;
        $user->last_name = $row->last_name;
        $user->email = $row->email;
        $user->street = $row->street;
        $user->city = $row->city;
        $user->state = $row->state;
        $user->zip = $row->zip;
        
        return $user;

    }

}