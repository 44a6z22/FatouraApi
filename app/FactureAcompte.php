<?php

namespace App;

use App\lib\NumerotationConverter;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function finalise()
    {
        $this->is_finalised = true;
        $this->save();
    }
    public function pay()
    {
        $this->payed_at = now();
        $this->save();
    }
    public function unpay()
    {
        $this->payed_at = null;
        $this->save();
    }


    public function store(Request $request, NumerotationConverter $converter,  $textId, $reglementId)
    {
        $this->user_id = Auth::user()->id;
        $this->devis_id = $request->devis_id;
        $this->montant = $request->montant;
        $this->uid = $converter->convert("<doc><aaaa><cmp>", 'App\FactureAcompte', count(Auth::user()->acomptes) + 1);
        $this->tva = $request->tva;
        $this->text_document_id = $textId;
        $this->reglement_id = $reglementId;
        $this->status_id = $request->status_id;
        $this->payed_at = null;
        $this->is_finalised = false;

        $this->save();
    }

    public function remove()
    {
        $this->is_deleted = true;
        $this->save();
    }
}
