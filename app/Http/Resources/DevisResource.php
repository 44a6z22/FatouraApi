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
            "durée_validité" => $this->duree_validite,
            "reglement" => new ReglementResource($this->reglements)

        ];
    }
}
