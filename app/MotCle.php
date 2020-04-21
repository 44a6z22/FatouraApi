<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MotCle extends Model
{
    public $table = "mot_clés";
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
        $this->client_id = $clientId;
        $this->societe_id = $societeId;
        $this->mot_de_value =  $value;
        $this->save();
    }
}
