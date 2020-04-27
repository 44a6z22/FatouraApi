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
        $htArray = [];
        $ttcArray = [];

        foreach ($this->articles as $article) {
            array_push($htArray, $article->total_ht);
            array_push($ttcArray, $article->total_ttc);
        }

        return [
            "id"          => $this->id,
            "user_id"           => $this->user_id,
            "statut_id"         => $this->status_id,
            "durée_validité"    => $this->duree_validité,
            "total_ht"          => array_sum($htArray),
            "total_ttc"         => array_sum($ttcArray),
            "reglement"         => new ReglementResource($this->reglements),
            "Text_Document"     => new TextDocumentResource($this->textDocument),
            "artiles"           => ArticleResource::collection($this->articles),
            "Keywords"          => MotCleResource::collection($this->mot_cles)

        ];
    }
}
