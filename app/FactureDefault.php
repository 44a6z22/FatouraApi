<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactureDefault extends Model
{
    //
    public function parametre(){
        return $this->belongsTo('App\Parameter');
    }
}
