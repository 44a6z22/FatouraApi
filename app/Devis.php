<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    //
    public function  reglements(){
        return $this->hasOne('App\Reglement','devis_id');
    }
    public function  articles(){
        return $this->hasMany('App\Article');
    }
    public function  text_Document(){
        return $this->belongsTo('App\Text_Document');
    }

}
