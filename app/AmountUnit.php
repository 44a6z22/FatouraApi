<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmountUnit extends Model
{
    //
    public function text_document_parameter()
    {
        return $this->hasMany(TextDocumentParameter::class);
    }
}
