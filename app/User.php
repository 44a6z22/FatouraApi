<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function Clients()
    {
        return $this->hasMany('App\Client');
    }

    public function users()
    {
        return $this->hasMany('App\Societe');
    }
    public function factures()
    {
        return $this->hasMany('App\Facture');
    }
    public function comptesBancaires()
    {
        return $this->hasMany('App\Compte_bancaire');
    }
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function parameteres()
    {
        return $this->hasMany('App\Parameter');
    }
    public function devises()
    {
        return $this->hasMany('App\Devis');
    }
}
