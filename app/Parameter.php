<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Parameter extends Model
{
    //

    public function text_document_parameter()
    {
        return $this->hasMany(TextDocumentParameter::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function facturedefault()
    {
        return $this->hasMany('App\FactureDefault');
    }
    public function numerotationParameter()
    {
        return $this->hasMany('App\NumerotationParameter');
    }
    public function compteurDefault()
    {
        return $this->hasMany('App\CompteurDefault');
    }

    public static function MakeIfNotExist($userId = null)
    {
        if (Parameter::get()->where('user_id', $userId)->first() == null) {
            return new Parameter();
        } else {
            return Parameter::get()->where('user_id', $userId)->first();
        }
    }

    public function store(Request $request)
    {
        $this->user_id = Auth::user()->id;
        $this->path = $request->path;
        $this->param_name = $request->name;
        $this->save();
    }
}
