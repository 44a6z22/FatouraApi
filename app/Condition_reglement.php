<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition_reglement extends Model
{
    //
    public function reglements(){
        return $this->hasMany('App\Reglement');
    }
}
