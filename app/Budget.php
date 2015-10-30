<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model

{

    protected $table = 'budget';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'expenses', 'savings', 'invest', 'income', 'cash'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

}
