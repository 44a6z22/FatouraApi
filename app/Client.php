<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function motclés(){
        return $this->hasMany('App\MotCle');
    }
    public function nums(){
        return $this->hasMany('App\Numtele');
    }
    public function adresses(){
        return $this->hasMany('App\Adress');
    }

    
}
