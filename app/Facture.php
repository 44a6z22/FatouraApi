<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Facture extends Model
{
    //
    public function  reglements()
    {
        return $this->hasOne('App\Reglement', 'facture_id');
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
    public function  societe()
    {
        return $this->belongsTo('App\Societe');
    }
    public function  user()
    {
        return $this->belongsTo('App\User');
    }


    public function mot_cles()
    {
        return $this->belongsToMany(MotCle::class);
    }

    public function store(Request $request, $textId)
    {
        $this->client_id = $request->client_id;
        $this->societe_id = $request->societe_id;
        $this->text_document_id = $textId;
        $this->user_id = $request->user_id;
        $this->status_id = $request->status_id;
        $this->save();
    }
    public function remove()
    {
        $this->is_deleted = true;
        $this->save();
    }
}
