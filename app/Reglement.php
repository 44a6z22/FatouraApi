<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    public function mode_reglement(){
        return $this->belongsTo('App\Mode_reglement');
    }

    public function  condition_reglement(){
        return $this->belongsTo('App\Condition_reglement');
    }

    public function  compte_bancaire(){
        return $this->belongsTo('App\Compte_bancaire');
    }

    public function  devis(){
        return $this->belongsTo('App\Devis');
    }

    public function  facture(){
        return $this->belongsTo('App\Facture');
    }

}
