<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            "quantité" => $this->quantité,
            "prix_ht" => $this->prix_ht,
            "tva" => $this->tva,
            "reduction" => $this->reduction,
            "total_ht" => $this->total_ht,
            "total_ttc" => $this->total_ttc,
            "description" => $this->description
        ];
    }
}
