<?php

namespace App\Http\Resources;

use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Resources\Json\JsonResource;

class PdfFactureResource extends JsonResource
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
        $tvaArray = [];
        $ttcArray = [];

        foreach ($this->articles as $article) {
            array_push($htArray, $article->total_ht);
            array_push($tvaArray, $article->total_ht * ($article->tva / 100));
            array_push($ttcArray, $article->total_ttc);
        }

        $totalHt = array_sum($htArray);
        $totalTVA = array_sum($tvaArray);
        $totalTTC = array_sum($ttcArray);

        $recipient = ($this->client == null) ? new CompanyPdfResource($this->societe) : null;
        return [
            "id" => $this->id,
            "uid" => "F2000003",
            "created_at" => $this->created_at,
            "pricePretax" => $totalHt,
            "tvaExempt" => $this->tva == 0,
            "taxAmount" => $totalTVA,
            // "reduction" => ($this->reduction == 0) ? null : true,
            // "reductionUnit" => "percent",
            // "reductionAmount" => $this->reduction,
            // "depositsAmount" => null,
            // "disbursementsAmount" => 0.0,
            "price" => $totalTTC,
            // "currency" => "mad",
            "paymentPeriod" => $this->reglements->condition_reglement->Condition_value,
            "paymentMode" => $this->reglements->mode_reglement->mode_value,
            "moratoriumInterest" => $this->reglements->interet_retard->inter_value . "% par mois",
            "notes" => $this->textDocument->Introduction,
            "articles" => ArticleResource::collection($this->articles),
            "recipients" => new CompanyPdfResource($this->societe),
            "user" => $this->user
        ];
    }
}
