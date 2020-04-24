<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Article extends Model
{
    //
    public function type_articles()
    {
        return $this->belongsTo('App\Type_article');
    }
    public function facture()
    {
        return $this->belongsTo('App\Facture');
    }
    public function devis()
    {
        return $this->belongsTo('App\Devis');
    }

    public function store($article, $factureId = null, $devisId = null)
    {

        $this->type_articles_id = $article['type_id'];
        $this->facture_id = $factureId;
        $this->devis_id = $devisId;
        $this->quantité = $article['quantité'];
        $this->prix_ht = $article['prix_ht'];
        $this->tva = $article['tva'];
        $this->reduction = $article['reduction'];
        $this->total_ht = $article['total_ht'];
        $this->total_ttc = $article['total_ttc'];
        $this->description = $article['description'];

        $this->save();
    }
}
