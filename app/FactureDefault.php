<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FactureDefault extends Model
{
    //
    public function parametre()
    {
        return $this->belongsTo('App\Parameter');
    }

    public function condition_reglement()
    {
        return $this->belongsTo(condition_reglement::class);
    }

    public function mode_reglement()
    {
        return $this->belongsTo(Mode_reglement::class);
    }

    public function interet_retard()
    {
        return $this->belongsTo(Interet_retard::class);
    }

    public static function MakeIfNotExist()
    {
        if (FactureDefault::all()->Where('parameter_id', Auth::user()->parameteres->first()->id)->first() != null) {
            return FactureDefault::all()->Where('parameter_id', Auth::user()->parameteres->first()->id)->first();
        } else {
            return new FactureDefault();
        }
    }

    public function store(Request $request)
    {
        $parameter = Parameter::MakeIfNotExist(Auth::user()->id);

        $this->parameter_id = $parameter->id;
        $this->tva_value = $request->tva_value;
        $this->text_tva_on = $request->text_tva_on;
        $this->text_tva_off = $request->text_tva_off;
        $this->mode_reglement_id = $request->mode_reglement_id;
        $this->condition_reglement_id = $request->condition_reglement_id;
        $this->interet_retard_id = $request->interet_retard_id;

        $this->save();
    }
}
