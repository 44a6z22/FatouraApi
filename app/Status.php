<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    public function factures()
    {
        return $this->hasMany('App\Facture');
    }
    public function devis()
    {
        return $this->hasMany('App\Devis');
    }
}
