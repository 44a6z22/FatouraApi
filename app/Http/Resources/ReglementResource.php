<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReglementResource extends JsonResource
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
            "Reglement_id" => $this->id,
            "Condition" => $this->condition_reglement->Condition_value,
            "Mode" => $this->mode_reglement->mode_value,
            "Interet_de_retard" => $this->interet_retard->inter_value . " %",
        ];
    }
}
