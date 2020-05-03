<?php

namespace App;

use App\lib\NumerotationConverter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class Facture extends Model
{
    private $pdf;
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

    public function facture_type()
    {
        return $this->belongsTo(FactureType::class);
    }

    public function store(Request $request, NumerotationConverter $converter, $textId)
    {
        $ttc = $ht = $tva = 0;
        foreach ($request->articles as $article) {
            $ht  += $article['total_ht'];
            $ttc += $article['total_ttc'];
            $tva += $ht * ($article['tva'] / 100);
        }

        $format = Auth::user()->parameteres->first()->numerotationParameter->first()->format;
        $length = intval(Auth::user()->parameteres->first()->numerotationParameter->first()->Min_compteur_valeur);

        $this->total_ht = $ht;
        $this->total_ttc = $ttc;
        $this->montant_tva = $tva;
        $this->uid = $converter->convert($format, 'App\Facture', count(Auth::user()->factures) + 1, $length);
        $this->client_id = $request->client_id;
        $this->societe_id = $request->societe_id;
        $this->text_document_id = $textId;
        $this->facture_type_id = $request->type_id;
        $this->user_id = Auth::user()->id;
        $this->status_id = $request->status_id;
        $this->payed_at = null;
        $this->facture_type_id = $request->facture_type_id;
        $this->save();
    }




    public function finalise()
    {
        $this->is_finalised = true;
        $this->save();
    }
    public function pay()
    {
        $this->payed_at = now();
        $this->save();
    }
    public function unpay()
    {
        $this->payed_at = null;
        $this->save();
    }

    public function remove()
    {
        $this->is_deleted = true;
        $this->save();
    }
}
