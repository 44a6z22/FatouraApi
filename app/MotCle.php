<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MotCle extends Model
{
    public $table = "mot_clés";
    //
    public function  clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function  societes()
    {
        return $this->belongsToMany('App\Societe');
    }

    public function factures()
    {
        return $this->belongsToMany(Facture::class);
    }

    public function devis()
    {
        return $this->belongsToMany(Devis::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function store($value, $clientId = null, $societeId = null)
    {
        $this->client_id = $clientId;
        $this->societe_id = $societeId;
        $this->mot_de_value =  $value;
        $this->save();
    }
}
