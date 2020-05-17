<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FactureAcompteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "uid" => $this->uid,
            "user_id" => $this->user_id,
            "devis_id" => $this->devis_id,
            "montant" => $this->montant,
            "tva" => $this->tva . "%",
            "text_document" => new TextDocumentResource($this->text_document),
            "reglement_id" => new ReglementResource($this->reglement),
            "status" => $this->status->status_value,
        ];
    }
}
