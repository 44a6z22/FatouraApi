<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactureAcompte extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }
    public function text_document()
    {
        return $this->belongsTo(Text_Document::class);
    }
    public function reglement()
    {
        return $this->belongsTo(Reglement::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
