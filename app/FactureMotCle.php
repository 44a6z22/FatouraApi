<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactureMotCle extends Model
{
    public $table = "facture_mot_cle";
    //

    public function store($factureId, $keywordId)
    {
        $this->facture_id = $factureId;
        $this->mot_cle_id = $keywordId;
        $this->save();
    }
}
