<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FactureResource extends JsonResource
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
            "Facture_id" => $this->id,
            "User_id" =>  $this->user_id,
            "Statut_id" => $this->status_id,

            "Reglement" => new ReglementResource($this->reglements),
            "Artiles" => ArticleResource::collection($this->articles),
            "Text_Document" => new TextDocumentResource($this->textDocument)
        ];
    }
}
