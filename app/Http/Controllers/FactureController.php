<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Article;
use App\FactureMotCle;
use App\Http\Resources\FactureResource;
use App\MotCle;
use App\Reglement;
use App\Text_Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
// use Tymon\JWTAuth\Contracts\Providers\Auth;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return [
            "factures" => FactureResource::collection(
                Facture::all()
                    ->where('is_deleted', false)
                    ->where('user_id', Auth::user()->id)
            )
        ];
        // return Facture::all();
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
        // $request->validate([
        //     "used_id" => "required",
        //     "Client_id" => "required",
        //     "societe_id" => "required",
        //     "status_id" => "required",
        //     "reglement" => "required",
        //     "article" => "required",
        //     "textDocument" => "required",
        //     "motCles" => "required"
        // ]);


        // add a new  text Document
        $text = new Text_Document();
        $text->store($request->textDocument);

        // add a new Facture
        $facture = new Facture();
        $facture->store($request, $text->id);

        // add new Reglement
        $Reglement = new Reglement();
        $Reglement->store($request->reglement, $facture->id, null);

        // add a new Article

        foreach ($request->articles as $newArticles) {
            $article = new Article();
            $article->store($newArticles, $facture->id, null);
        }

        // add new keywords
        $kwds = [];
        foreach ($request->motCles as $kwd) {

            // a keyword already exist ? 
            // don't add it again to the keyword table.

            if (!in_array($kwd['value'], $kwds)) {

                array_push($kwds, $kwd['value']);
                $keyword = MotCle::makeIfNotExist($kwd['value'], $request->user_id);
                $factureMotCle = new FactureMotCle();
                $factureMotCle->store($facture->id, $keyword->id);
            }
        }
        return $facture;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        //
        if ($facture->is_deleted) {
            abort(404);
        }

        return new FactureResource($facture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $facture = Facture::find($id);
        $facture->save();
        return $facture;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $facture = Facture::find($id);
        $facture->remove();
    }


    public function physicalDelete($id)
    {
        Facture::destroy($id);
    }

    public function exportPdf($id)
    {
        $data = Facture::find($id);

        if ($data == null) {
            return abort(404);
        }
        if ($data->is_deleted) {
            return abort(404);
        }
        $pdf = PDF::loadView('FactureData', compact('data'));

        return $pdf->download('invoice.pdf');
    }
}
