<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TextDocumentResource extends JsonResource
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
            "introduction" => $this->Introduction,
            "Conclusion" => $this->Conclusion,
            "footer" => $this->Pied_page,
            "condition" => $this->Condition_general
        ];
    }
}
