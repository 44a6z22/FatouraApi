<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Article;
use App\FactureMotCle;
use App\Http\Resources\FactureResource;
use App\Http\Resources\PdfFactureResource;
use App\lib\NumerotationConverter;
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

        $facture->store($request, new NumerotationConverter, $text->id);

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

        //cheking if the facture is finalised
        if ($facture->is_finalised===1){
            return "Sorry but this facture is already finalised";
        }


        // Updating  the facture reglement 

        $reglement_id=$facture->reglements()->get()[0]->id;
        $reglement= Reglement::find($reglement_id);
        $reglement->mode_reglement_id=$request["Reglement"]["mode_reglement_id"];
        $reglement->condition_reglement_id=$request["Reglement"]["condition_reglement_id"];
        $reglement->interet_retard_id=$request["Reglement"]["interet_retard_id"];
        $reglement->compte_bancaire_id=$request["Reglement"]["compte_bancaire_id"];
        $reglement->save();

        //Updating text on the document 

        $textdocId=$facture->textDocument()->get()[0]->id;
        $textDoc= Text_Document::find($textdocId);
        $textDoc->Conclusion=$request["Text_Document"]["Conclusion"];
        $textDoc->Pied_page=$request["Text_Document"]["footer"];
        $textDoc->Condition_general=$request["Text_Document"]["condition"];
        $textDoc->save();


        //Removing old  And Adding New  keyWords : 
        $keyword=MotCle::where('user_id', '=', Auth::user()->id);
        $keyword->delete();        
    
    
         

        $kwds = [];
        foreach ($request->motCles as $kwd) {

            if (!in_array($kwd['value'], $kwds)) {
                array_push($kwds, $kwd['value']);
                $keyword = MotCle::makeIfNotExist($kwd['value'], $request->user_id);
                $factureMotCle = new FactureMotCle();
                $factureMotCle->store($facture->id, $keyword->id);
            }
        }


        //Updating  the facture client and societe Id

        $facture->client_id=$request->client_id;
        $facture->societe_id=$request->societe_id;


        //Updating  And adding if there is new  Articles to the facture

        $Acd=count($facture["Articles"]);
        $Ajd=count($request->Articles);

        for ($i=0;$i<$Acd;$i++){
            $articles= Article::find($facture["Articles"][$i]->id);
            $articles->quantité=$request->Articles[$i]["quantité"];
            $articles->type_articles_id=$request->Articles[$i]["type_article_id"];
            $articles->prix_ht=$request->Articles[$i]["prix_ht"];
            $articles->tva=$request->Articles[$i]["tva"];
            $articles->reduction=$request->Articles[$i]["reduction"];
            $articles->total_ht=$request->Articles[$i]["total_ht"];
            $articles->total_ttc=$request->Articles[$i]["total_ttc"];
            $articles->description=$request->Articles[$i]["description"];
            $articles->save();
        }
        
        if($Acd!==$Ajd){

            for ($j=$Acd;$j<$Ajd;$j++){
                $article = new Article();
                $article->type_articles_id = $request->Articles[$j]["type_article_id"];
                $article->facture_id = $id;
                $article->quantité = $request->Articles[$j]["quantité"];
                $article->prix_ht = $request->Articles[$j]["prix_ht"];
                $article->tva = $request->Articles[$j]["tva"];
                $article->reduction = $request->Articles[$j]["reduction"];
                $article->total_ht = $request->Articles[$j]["total_ht"];
                $article->total_ttc =$request->Articles[$j]["total_ttc"];
                $article->description = $request->Articles[$j]["description"];
                $article->save();
            }

        }

 
        $facture->save();




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

    public function finalise($id)
    {
        $facture = Facture::find($id);
        $facture->finalise();
    }

    public function pay($id)
    {
        $facture = Facture::find($id);
        $facture->pay();
    }
    public function unpay($id)
    {
        $facture = Facture::find($id);
        $facture->unpay();
    }

    public function exportPdf($id)
    {
        $data = new PdfFactureResource(Facture::find($id));

        if ($data == null) {
            return abort(404);
        }
        if ($data->is_deleted) {
            return abort(404);
        }
        if (!$data->is_finalised) {
            return ["this Bill isn't finalised yet ."];
        }

        $pdf = PDF::loadView('FactureData', compact('data'));

        return $pdf->download($data->uid . '.pdf');
    }
}
