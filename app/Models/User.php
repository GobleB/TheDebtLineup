<?php 

namespace App\Models;

use DB;

class User { 

    private function update($x) {
        
        $sql = "
            UPDATE users
            SET first_name = :first_name, last_name = :last_name, email = :email, password = :password, street = :street, city = :city, state = :state, zip = :zip
            WHERE id = :id
            ";

        return DB::insert($sql, ["first_name"=>$x->first_name,"last_name"=>$x->last_name,"email"=>$x->email,"password"=>$x->password, "street"=>$x->street, "city"=>$x->city, "state"=>$x->state, "zip"=>$x->zip, "id"=>$x->id, ]);

    }

    public function save($x) {
        if (empty($x->id)) {
            $this->insert($x);
        } else {
            $this->update($x);
        }
    }

}