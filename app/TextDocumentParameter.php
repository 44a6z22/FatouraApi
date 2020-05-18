<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TextDocumentParameter extends Model
{
    //
    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }

    public function type_text_document_parameter()
    {
        return $this->belongsTo(TypeTextDocumentParameter::class);
    }

    public function amount_unit()
    {
        return $this->belongsTo(AmountUnit::class);
    }

    public static function MakeIfNotExist($textTypeId)
    {
        $p = TextDocumentParameter::all()
            ->Where('parameter_id', Auth::user()->parameteres->first()->id)
            ->where('type_text_document_parameter_id', $textTypeId)
            ->first();

        if ($p != null) {
            return $p;
        } else {
            return new TextDocumentParameter();
        }
    }

    public function store(Request $request)
    {
        $parameter = Parameter::MakeIfNotExist(Auth::user()->id);

        $this->parameter_id = $parameter->id;
        $this->type_text_document_parameter_id = $request->type_text_document_parameter_id;
        $this->amount_unit_id = $request->amount_unit_id;
        $this->amount = $request->amount;
        $this->is_name_shown = $request->is_name_shown;
        $this->Introduction = $request->Introduction;
        $this->Conclution = $request->Conclution;
        $this->footer = $request->footer;
        $this->condition_general = $request->condition_general;

        $this->save();
    }
}
