<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Numtele extends Model
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
        $this->Num_value = $value;
        $this->save();
    }
}
