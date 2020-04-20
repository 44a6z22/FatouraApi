<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function Clients(){
        return $this->hasMany('App\Client');
    }

}
