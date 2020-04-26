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
use Illuminate\Support\Facades\Auth;

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
        $devis = Devis::all()
            ->where('is_deleted', false)
            ->where('user_id', Auth::user()->id);

        return (count($devis) != 0) ? DevisResource::collection($devis) :  abort(404);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $devis = Devis::find($id);

        if ($devis->is_deleted) {
            abort(404);
        }

        return new DevisResource($devis);
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
        $devis->remove();

        return ["deleted with success"];
    }
    public function exportPdf($id)
    {
        $data = Devis::find($id);

        if ($data == null) {
            return abort(404);
        }
        if ($data->is_deleted) {
            return abort(404);
        }
        $pdf = PDF::loadView('Pdf', compact('data'));

        return $pdf->download('invoice.pdf');
    }
}
