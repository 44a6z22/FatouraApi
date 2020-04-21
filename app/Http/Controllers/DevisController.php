<?php

namespace App\Http\Controllers;

use App\Devis;
use App\Http\Resources\DevisResource;
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
        $text->store($request);

        // add a new Facture
        $devis = new Devis();
        $devis->store($request, $text->id);

        // add new Reglement
        $Reglement = new Reglement();
        $Reglement->store($request, null, $devis->id);

        // add a new Article

        $article = new Article();
        $article->store($request, null, $devis->id);

        // add new keywords 
        foreach ($request->motCles as $kwd) {
            $keyword = new MotCle();
            $keyword->store($kwd["mot_de_value"], $request->client_id, $request->societe_id);
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
        new DevisResource(Devis::find($id)->first());
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
