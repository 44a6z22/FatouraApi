<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    //
    public function  reglements(){
        return $this->hasOne('App\Reglement','facture_id');
    }
}
