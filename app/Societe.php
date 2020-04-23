<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Societe extends Model
{
    //
    public function motCles()
    {
        return $this->hasMany('App\MotCle');
    }
    public function nums()
    {
        return $this->hasMany('App\Numtele');
    }
    public function addresses()
    {
        return $this->hasMany('App\Adress');
    }
    public function clients()
    {
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
    public function user()
    {
        return $this->belongsTo('App\User');
    }




    public function mot_cles()
    {
        return $this->belongsToMany(MotCle::class);
    }



    public function store(Request $request)
    {
        $this->user_id = $request->user_id;
        $this->Societe_Nom = $request->Societe_Nom;
        $this->Societe_identifiant_fiscale = $request->Societe_identifiant_fiscale;
        $this->Societe_identifiant_commun_entreprise = $request->Societe_identifiant_commun_entreprise;
        $this->Societe_Taxe_Professionelle = $request->Societe_Taxe_Professionelle;
        $this->Societe_Pays = $request->Societe_Pays;
        $this->Societe_Note = $request->Societe_Note;
        $this->Societe_Ville = $request->Societe_Ville;
        $this->Societe_Site_Internet = $request->Societe_Site_Internet;
        $this->save();
    }

    public function remove()
    {
        $this->is_deleted = true;
        $this->save();
    }
}
