<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyPdfResource extends JsonResource
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
            "city" => $this->Societe_Ville,
            // "street" => "dlfkslkj",
            "company" => $this->Societe_Nom,
            "country" => $this->Societe_Pays,
            "website" => $this->Societe_Site_Internet,
            // "language" => "fr",
            // "zip_code" => "121211",
            "vat_number" => $this->Societe_Taxe_Professionelle,
            "company_number" => $this->Societe_identifiant_commun_entreprise,
            "company_phones" => PhoneNumberResource::collection($this->nums),
            "additional_address_lines" => AdressResource::collection($this->addresses)
        ];
    }
}
