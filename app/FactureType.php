<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactureType extends Model
{
    //
    public function facture()
    {
        return $this->hasMany(Facture::class);
    }
}
