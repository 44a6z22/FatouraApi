<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interet_retard extends Model
{
    //

    public function reglement()
    {
        return $this->hasMany(Reglement::class);
    }
}
