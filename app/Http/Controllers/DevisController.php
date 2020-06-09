<?php

namespace App\Http\Controllers;

use App\Article;
use App\Devis;
use App\DevisMotCle;
use App\FactureMotCle;
use App\Http\Resources\DevisResource;
use App\lib\NumerotationConverter;
use App\MotCle;
use App\Reglement;
use App\Status;
use App\Text_Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class DevisController extends Controller
{
 
    public function index()
    {
        //
        $devis = Devis::all()
            ->where('is_deleted', false)
            ->where('user_id', Auth::user()->id);

        return (count($devis) != 0) ? DevisResource::collection($devis) :  abort(404);
    }

 
    
    public function store(Request $request)
    {
        // 
        if (Status::find($request->status_id) == null) {
            return ["Status not found"];
        }

        // add a new  text Document
        $text = new Text_Document();
        $text->store($request->textDocument);

        // add a new Facture
        $devis = new Devis();
        $devis->store($request, new NumerotationConverter,  $text->id);

        $Reglement = new Reglement();
        $Reglement->store($request->reglement, null, $devis->id);

        // add a new Article
        foreach ($request->articles as $newArticles) {
            $article = new Article();
            $article->store($newArticles, null, $devis->id);
        }

        // add new keywords
        $kwds = [];
        foreach ($request->motCles as $kwd) {
            // a keyword already exist ? 
            // don't add it again to the keyword table.
            if (!in_array($kwd['value'], $kwds)) {

                array_push($kwds, $kwd['value']);
                $keyword = MotCle::makeIfNotExist($kwd['value'], $request->user_id);
                $devisMotCle = new DevisMotCle();
                $devisMotCle->store($devis->id, $keyword->id);
            }
        }

        return new DevisResource($devis);
    }

 
    public function show($id)
    {
        $devis = Devis::find($id);

        if ($devis->is_deleted) {
            abort(404);
        }

        return new DevisResource($devis);
    }


    
    public function update(Request $request, $id)
    {
        $devis = Devis::find($id);

        //cheking if the facture is finalised
        if ($devis->is_finalised === 1) {
            return "Sorry but this facture is already finalised";
        }

        //Updating  the Devis  client,societe,Status,duree_validité
        $devis->client_id = $request->client_id;
        $devis->societe_id = $request->societe_id;
        $devis->status_id = $request->status_id;
        $devis->duree_validité = $request->duree_validite;



        // Updating  the facture reglement 

        $reglement_id = $devis->reglements()->get()[0]->id;
        $reglement = Reglement::find($reglement_id);
        $reglement->mode_reglement_id = $request["Reglement"]["mode_reglement_id"];
        $reglement->condition_reglement_id = $request["Reglement"]["condition_reglement_id"];
        $reglement->interet_retard_id = $request["Reglement"]["interet_retard_id"];
        $reglement->compte_bancaire_id = $request["Reglement"]["compte_bancaire_id"];
        $reglement->save();



        //Updating  And adding if there is new  Articles to the Devis

        $Acd = count($devis["Articles"]);
        $Ajd = count($request->Articles);

        for ($i = 0; $i < $Acd; $i++) {
            $articles = Article::find($devis["Articles"][$i]->id);
            $articles->quantité = $request->Articles[$i]["quantité"];
            $articles->type_articles_id = $request->Articles[$i]["type_article_id"];
            $articles->prix_ht = $request->Articles[$i]["prix_ht"];
            $articles->tva = $request->Articles[$i]["tva"];
            $articles->reduction = $request->Articles[$i]["reduction"];
            $articles->total_ht = $request->Articles[$i]["total_ht"];
            $articles->total_ttc = $request->Articles[$i]["total_ttc"];
            $articles->description = $request->Articles[$i]["description"];
            $articles->save();
        }



        if ($Acd !== $Ajd) {

            for ($j = $Acd; $j < $Ajd; $j++) {
                $article = new Article();
                $article->type_articles_id = $request->Articles[$j]["type_article_id"];
                $article->devis_id = $id;
                $article->quantité = $request->Articles[$j]["quantité"];
                $article->prix_ht = $request->Articles[$j]["prix_ht"];
                $article->tva = $request->Articles[$j]["tva"];
                $article->reduction = $request->Articles[$j]["reduction"];
                $article->total_ht = $request->Articles[$j]["total_ht"];
                $article->total_ttc = $request->Articles[$j]["total_ttc"];
                $article->description = $request->Articles[$j]["description"];
                $article->save();
            }
        }


        //Updating text on the document 

        $textdocId = $devis->textDocument()->get()[0]->id;
        $textDoc = Text_Document::find($textdocId);
        $textDoc->Introduction = $request["Text_Document"]["introduction"];
        $textDoc->Conclusion = $request["Text_Document"]["conclusion"];
        $textDoc->Pied_page = $request["Text_Document"]["footer"];
        $textDoc->Condition_general = $request["Text_Document"]["condition"];
        $textDoc->save();


        //Removing old  And Adding New  keyWords : 
        $keyword = MotCle::where('user_id', '=', Auth::user()->id);
        $keyword->delete();

        $kwds = [];
        foreach ($request->motCles as $kwd) {
            if (!in_array($kwd['value'], $kwds)) {
                array_push($kwds, $kwd['value']);
                $keyword = MotCle::makeIfNotExist($kwd['value'], $request->user_id);
                $devisMotCle = new DevisMotCle();
                $devisMotCle->store($devis->id, $keyword->id);
            }
        }



        $devis->save();
        // $devis = Devis::find($id);
        // $devis->duree_validité = $request->input('duree_validité');
        // $devis->save();
        // return $devis;
    }

 
    public function destroy($id)
    {
        //
        $devis = Devis::find($id);
        $devis->remove();

        return ["deleted with success"];
    }


    public function sign($id)
    {
        $devis = Devis::find($id);
        $devis->sign();
    }
    public function unsign($id)
    {
        $devis = Devis::find($id);
        $devis->unsign();
    }
    public function refuse($id)
    {
        $devis = Devis::find($id);
        $devis->refuse();
    }
    public function cancelRefuse($id)
    {
        $devis = Devis::find($id);
        $devis->cancelRefuse();
    }
    public function finalise($id)
    {
        $devis = Devis::find($id);
        $devis->finalise();
    }

    public function exportPdf($id)
    {
        $data = Devis::find($id);

        // check if the thing exist.
        if ($data == null) {
            return $data;
        }

        // check if the user owns the thing 
        if ($data->user->id != Auth::user()->id) {
            return ["not your bro"];
        }


        if ($data->is_deleted) {
            return abort(404);
        }

        if (!$data->is_finalised) {
            return [
                "this item is not finalised yet "
            ];
        }

        $pdf = PDF::loadView(
            'DevisData',
            compact('data')
        );

        return $pdf->download($data->uid . '.pdf');
    }
}
