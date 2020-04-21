<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text_Document extends Model
{
    //
    public function factures()
    {
        return $this->hasMany('App\Facture');
    }
    public function devis()
    {
        return $this->hasMany('App\Devis');
    }

    public function store($textDocument)
    {
        $this->Introduction = $textDocument["introduction"];
        $this->Conclusion = $textDocument["conclusion"];
        $this->Pied_page = $textDocument["pied_page"];
        $this->condition_general = $textDocument["condition"];
        $this->save();
    }
}
