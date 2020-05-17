<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NumerotationParameter extends Model
{
    //
    public function parametre()
    {
        return $this->belongsTo('App\Parameter');
    }
    public function formatcodes()
    {
        return $this->hasMany('App\FormatCode');
    }

    public static function MakeIfNotExist()
    {
        if (NumerotationParameter::all()->Where('parameter_id', Auth::user()->parameteres->first()->id)->first() != null) {
            return NumerotationParameter::all()->Where('parameter_id', Auth::user()->parameteres->first()->id)->first();
        } else {
            return new NumerotationParameter();
        }
    }

    public function store(Request $request)
    {
        $parameter = Parameter::MakeIfNotExist(Auth::user()->id);
        $this->parameter_id = $parameter->id;
        $this->format = $request->num["format"];
        $this->Min_compteur_valeur = $request->num["counter_init"];
        $this->save();
    }
}
