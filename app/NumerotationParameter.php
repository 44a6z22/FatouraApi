<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NumerotationParameter extends Model
{
    //
    public function parametre(){
        return $this->belongsTo('App\Parameter');
    }
    public function formatcodes(){
        return $this->hasMany('App\FormatCode');
    }
}
