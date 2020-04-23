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
            "user_id" => $this->user_id,
            "Societe_identifiant_fiscale" => $this->Societe_identifiant_fiscale,
            "Societe_identifiant_commun_entreprise" => $this->Societe_identifiant_commun_entreprise,
            "Societe_Nom" => $this->Societe_Nom,
            "Societe_Taxe_Professionelle" => $this->Societe_Taxe_Professionelle,
            "Societe_Pays" => $this->Societe_Pays,
            "Societe_Note" => $this->Societe_Note,
            "Societe_Ville" => $this->Societe_Ville,
            "Societe_Site_Internet" => $this->Societe_Site_Internet,
            "Adresses" => AdressResource::collection($this->addresses),
            "Phones" => PhoneNumberResource::collection($this->nums),
            "Keywords" => MotCleResource::collection($this->mot_cles)
        ];
    }
}
