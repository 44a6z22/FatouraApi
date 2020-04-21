<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompteurDefault extends Model
{
    //
    public function parametre(){
        return $this->belongsTo('App\Parameter');
    }
}
