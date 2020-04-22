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
        $htArray = [];
        $ttcArray = [];
        foreach ($this->articles as $article) {
            array_push($htArray, $article->total_ht);

            array_push($ttcArray, $article->total_ttc);
        }

        return [
            "Facture_id" => $this->id,
            "User_id" =>  $this->user_id,
            "Statut_id" => $this->status_id,
            "Total_ht" => array_sum($htArray),
            "Total_ttc" => array_sum($ttcArray),
            "Artiles" => ArticleResource::collection($this->articles),
            "Reglement" => new ReglementResource($this->reglements),
            "Text_Document" => new TextDocumentResource($this->textDocument)
        ];
    }
}
