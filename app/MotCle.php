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



    public function store($value, $userId = null)
    {
        $this->user_id = $userId;
        // $this->societe_id = $societeId;
        $this->mot_de_value =  $value;
        $this->save();
    }

    public function isExist($value)
    {
        // $this->id = $this::where("Mot_de_value", $value)->first()->id;
        return $this::where('Mot_de_value', $value)->first();
    }
}
