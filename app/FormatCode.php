<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormatCode extends Model
{
    //
    public function numerotationParameters(){
        return $this->hasMany('App\NumerotationParameter');
    }
}
