<?php

namespace App\Http\Controllers;

use App\Devis;
use App\FactureAcompte;
use App\Http\Resources\FactureAcompteResource;
use App\lib\NumerotationConverter;
use App\Reglement;
use App\Status;
use App\Text_Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class FactureAcompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            "Facture-acompte" => FactureAcompteResource::collection(
                FactureAcompte::all()
                    ->where('user_id', Auth::user()->id)
                    ->where("is_deleted", false)
            )
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check before adding anything 

        if (Devis::find($request->devis_id) == null) {
            return ["devis not found"];
        }

        if (Status::find($request->status_id) == null) {
            return ["Status not found"];
        }

        //adding text 
        $text = new Text_Document();
        $text->store($request->text_document);

        // adding Reglement 
        $reglement = new Reglement();
        $reglement->store($request->reglement);

        // adding facture d'acompte
        $factureAcompte = new FactureAcompte();
        $factureAcompte->store($request, new NumerotationConverter, $text->id, $reglement->id);


        return new FactureAcompteResource($factureAcompte);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FactureAcompte  $factureAcompte
     * @return \Illuminate\Http\Response
     */
    public function show(FactureAcompte $factureAcompte)
    {
        if ($factureAcompte == null) {
            return abort(404);
        }

        if ($factureAcompte->is_deleted) {
            return abort(404);
        }

        return new FactureAcompteResource($factureAcompte);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FactureAcompte  $factureAcompte
     * @return \Illuminate\Http\Response
     */
    public function edit(FactureAcompte $factureAcompte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FactureAcompte  $factureAcompte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactureAcompte $factureAcompte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FactureAcompte  $factureAcompte
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactureAcompte $factureAcompte)
    {
        //
        $factureAcompte->remove();
    }





    public function finalise($id)
    {
        $facture = FactureAcompte::find($id);
        $facture->finalise();
    }

    public function pay($id)
    {
        $facture = FactureAcompte::find($id);
        $facture->pay();
    }
    public function unpay($id)
    {
        $facture = FactureAcompte::find($id);
        $facture->unpay();
    }

    public function exportPdf($id)
    {
        $data = FactureAcompte::find($id);

        if ($data == null) {
            return abort(404);
        }
        if ($data->is_deleted) {
            return abort(404);
        }


        $pdf = PDF::loadView(
            'FactureAcompteData',
            compact('data')
        );
        return $pdf->download($data->uid . '.pdf');
    }
}
