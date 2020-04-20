<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte_bancaire extends Model
{
    //
    public function reglements(){
        return $this->hasMany('App\Reglement');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
