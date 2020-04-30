<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Compte_bancaire extends Model
{
    //
    public function reglements()
    {
        return $this->hasMany('App\Reglement');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function store(Request $request)
    {
        $this->user_id = Auth::user()->id;
        $this->IBAN = $request->IBAN;
        $this->BIC = $request->BIC;
        $this->Titulaire = $request->Titulaire;
        $this->Libelle_Du_Compte = $request->Libelle_Du_Compte;
        $this->save();
    }
}
