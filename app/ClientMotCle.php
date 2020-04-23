<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientMotCle extends Model
{
    public $table = "client_mot_cle";
    //


    public function store($clientId, $keywordId)
    {

        $this->client_id = $clientId;
        $this->mot_cle_id = $keywordId;
        $this->save();
    }
}
