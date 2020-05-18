<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTextDocumentParameter extends Model
{
    //
    public function text_document_parameter()
    {
        return $this->hasMany(TextDocumentParameter::class);
    }
}
