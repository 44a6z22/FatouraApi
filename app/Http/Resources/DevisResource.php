<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DevisResource extends JsonResource
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
            "devis_id" => $this->id,
            "User_id" =>  $this->user_id,
            "Statut_id" => $this->status_id,
            "durée_validité" => $this->duree_validité,
            "Reglement" => new ReglementResource($this->reglements),
            "Text_Document" => new TextDocumentResource($this->textDocument),
            "Artiles" => ArticleResource::collection($this->articles),
            "Keywords" => MotCleResource::collection($this->mot_cles)
        ];
    }
}
