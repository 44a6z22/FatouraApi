<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    //
    public function  client()
    {
        return $this->belongsTo('App\Client');
    }
    public function  societe()
    {
        return $this->belongsTo('App\Societe');
    }




    public function store($value, $clientId = null, $societeId = null)
    {

        $this->societe_id = $societeId;
        $this->client_id = $clientId;
        $this->Adress_value = $value;
        $this->save();
    }
}
