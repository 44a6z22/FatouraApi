<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    //
    public function  reglements(){
        return $this->hasOne('App\Reglement','devis_id');
    }

}
