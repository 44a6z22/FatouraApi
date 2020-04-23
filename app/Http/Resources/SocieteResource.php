<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SocieteResource extends JsonResource
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
            "Adresses" => AdressResource::collection($this->addresses),
            "Phones" => PhoneNumberResource::collection($this->nums),
            "Keywords" => MotCleResource::collection($this->mot_cles)
        ];
    }
}
