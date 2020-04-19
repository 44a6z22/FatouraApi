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
            "Reglement" => new ReglementResource($this->reglements)
        ];
    }
}
