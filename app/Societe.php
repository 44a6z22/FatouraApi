<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    //
    public function motCles()
    {
        return $this->hasMany('App\MotCle');
    }
    public function numTeles()
    {
        return $this->hasMany('App\Numtele');
    }
    public function addresses()
    {
        return $this->hasMany('App\Adress');
    }
    public function clients(){
        return $this->hasMany('App\Client');
    }
    public function devis()
    {
        return $this->hasMany('App\Devis');
    }
    public function factures()
    {
        return $this->hasMany('App\Facture');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
