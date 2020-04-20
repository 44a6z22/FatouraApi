<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function type_articles(){
        return $this->belongsTo('App\Type_article');
    }
    public function facture(){
        return $this->belongsTo('App\Facture');
    }
    public function devis(){
        return $this->belongsTo('App\Devis');
    }
}
