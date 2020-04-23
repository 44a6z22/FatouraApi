<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevisMotCle extends Model
{
    public $table = "devis_mot_cle";
    //
    public function store($devisId, $keywordId)
    {
        $this->devis_id = $devisId;
        $this->mot_cle_id = $keywordId;
        $this->save();
    }
}
