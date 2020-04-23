<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocieteMotCle extends Model
{

    public $table = "mot_cle_societe";
    //



    public function store($companyId, $keywordId)
    {
        $this->societe_id = $companyId;
        $this->mot_cle_id = $keywordId;
        $this->save();
    }
}
