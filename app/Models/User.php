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

    static public function get($id) {

        $user = new User();

        $sql = "
                SELECT * 
                FROM users
                WHERE id = :id
                ";

        $row = DB::selectOne($sql, ["id"=>$id]);           

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