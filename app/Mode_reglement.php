<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode_reglement extends Model
{
    public function reglements()
    {
        return $this->hasMany('App\Reglement');
    }
    public function
    default()
    {
        return $this->hasOne(FactureDefault::class);
    }
}
