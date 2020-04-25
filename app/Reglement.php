<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Reglement extends Model
{
    public function mode_reglement()
    {
        return $this->belongsTo('App\Mode_reglement');
    }

    public function  condition_reglement()
    {
        return $this->belongsTo('App\Condition_reglement');
    }

    public function  compte_bancaire()
    {
        return $this->belongsTo('App\Compte_bancaire');
    }

    public function interet_retard()
    {
        return $this->belongsTo(interet_retard::class);
    }

    public function  devis()
    {
        return $this->belongsTo('App\Devis');
    }

    public function  facture()
    {
        return $this->belongsTo('App\Facture');
    }
    public function acomptes()
    {
        return $this->hasMany(FactureAcompte::class);
    }





    public function store($reglement, $facureId = null, $devisId = null)
    {
        $this->condition_reglement_id = $reglement["condition_id"];
        $this->mode_reglement_id = $reglement['mode_id'];
        $this->interet_retard_id = $reglement['interet_id'];
        $this->compte_bancaire_id = $reglement['compte_bancaire'];
        $this->facture_id = $facureId;
        $this->devis_id = $devisId;
        $this->save();
    }
}
