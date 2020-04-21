<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
    public function  text_Document()
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



    public function store(Request $request, $textId)
    {
        $this->duree_validité = $request->duree_validite;
        $this->client_id = $request->client_id;
        $this->societe_id = $request->societe_id;
        $this->textDocument_id = $textId;
        $this->user_id = $request->user_id;
        $this->status_id = $request->status_id;

        $this->save();
    }
}
