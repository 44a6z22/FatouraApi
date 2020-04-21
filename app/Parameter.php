<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function facturedefault()
    {
        return $this->hasMany('App\FactureDefault');
    }
    public function numerotationParameter()
    {
        return $this->hasMany('App\NumerotationParameter');
    }
    public function compteurDefault()
    {
        return $this->hasMany('App\CompteurDefault');
    }
}
