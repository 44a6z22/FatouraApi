<?php

namespace App\Http\Controllers;

use App\Article;
use App\Devis;
use App\DevisMotCle;
use App\FactureMotCle;
use App\Http\Resources\DevisResource;
use App\MotCle;
use App\Reglement;
use App\Text_Document;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $devis = Devis::all();
        return DevisResource::collection($devis);
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
        // 
        // add a new  text Document
        $text = new Text_Document();
        $text->store($request->textDocument);

        // add a new Facture
        $devis = new Devis();
        $devis->store($request, $text->id);

        $Reglement = new Reglement();
        $Reglement->store($request->reglement, null, $devis->id);

        // add a new Article
        foreach ($request->articles as $newArticles) {
            $article = new Article();
            $article->store($newArticles, null, $devis->id);
        }
        // add new keywords
        foreach ($request->motCles as $kwd) {
            // a keyword already exist ? 
            // don't add it again to the keyword table.

            $keyword = new MotCle();;

            if ($keyword->isExist($kwd["mot_de_value"]) == null) {
                $keyword->store($kwd["mot_de_value"], $request->user_id);
            } else {
                $keyword = MotCle::where('Mot_de_value', $kwd['mot_de_value'])->first();
            }


            $factureMotCle = new FactureMotCle();
            $factureMotCle->devis_id = $devis->id;
            $factureMotCle->mot_cle_id = $keyword->id;
            $factureMotCle->save();
        }

        return new DevisResource($devis);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return new DevisResource(Devis::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $devis = Devis::find($id);
        $devis->duree_validité = $request->input('duree_validité');
        $devis->save();
        return $devis;
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
        $devis = Devis::find($id);
        $devis->delete();
        return ["deleted with success"];
    }
}
