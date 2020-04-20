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
}
