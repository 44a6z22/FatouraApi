<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Devis extends Model
{
    //
    public function  reglements()
    {
        return $this->hasOne('App\Reglement', 'devis_id');
    }
    public function  articles()
    {
        return $this->hasMany('App\Article');
    }
    public function  textDocument()
    {
        return $this->belongsTo('App\Text_Document');
    }
    public function  statut()
    {
        return $this->belongsTo('App\Status');
    }
    public function  client()
    {
        return $this->belongsTo('App\Client');
    }
    public function societes()
    {
        return $this->belongsTo('App\Societe');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function acomptes()
    {
        return $this->hasMany(FactureAcompte::class);
    }
    public function mot_cles()
    {
        return $this->belongsToMany(MotCle::class);
    }


    public function sign()
    {
        $this->is_signed = true;
        $this->save();
    }

    public function unsign()
    {
        $this->is_signed = false;
        $this->save();
    }

    public function finalise()
    {
        $this->is_finalised = true;
        $this->save();
    }

    public function refuse()
    {
        $this->is_refused = true;
        $this->save();
    }

    public function cancelRefuse()
    {
        $this->is_refused = false;
        $this->save();
    }

    public function store(Request $request, $textId)
    {
        $this->duree_validité = $request->duree_validite;
        $this->client_id = $request->client_id;
        $this->societe_id = $request->societe_id;
        $this->text_document_id = $textId;
        $this->user_id = Auth::user()->id;
        $this->status_id = $request->status_id;

        $this->save();
    }
    public function remove()
    {
        $this->is_deleted = true;
        $this->save();
    }
}
