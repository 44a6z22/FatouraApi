<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Client extends Model
{
    //
    public function motclés()
    {
        return $this->hasMany('App\MotCle');
    }
    public function nums()
    {
        return $this->hasMany('App\Numtele');
    }
    public function adresses()
    {
        return $this->hasMany('App\Adress');
    }

    public function devises()
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

    public function societe()
    {
        return $this->belongsTo('App\Societe');
    }

    public function mot_cles()
    {
        return $this->belongsToMany(MotCle::class);
    }

    public function store(Request $request)
    {
        $this->user_id = $request->user_id;

        $this->societe_id = $request->societe_id;

        $this->Client_Nom = $request->Client_Nom;

        $this->Client_Prenom = $request->Client_Prenom;

        $this->Client_Ville = $request->Client_Ville;

        $this->Client_Code_Postal = $request->Client_Code_Postal;

        $this->Client_Pays = $request->Client_Pays;

        $this->Client_SiteInternet = $request->Client_SiteInternet;

        $this->Client_Fonction = $request->Client_Fonction;

        $this->Client_Note = $request->Client_Note;

        $this->save();
    }
}
