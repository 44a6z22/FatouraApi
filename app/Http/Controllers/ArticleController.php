<?php

namespace App\Http\Controllers;

use App\Article;
use App\Devis;
use App\Facture;
use App\Type_article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $article=Article::all();
        return $article;  
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
        
        $article=new Article();
        $type_article=new Type_article();
        $facture=new Facture();
        $devis=new Devis();

        $type_article->article_type_value=$request->input('article_type_value');
        $type_article->article_type_value_eng=$request->input('article_type_value_eng');
        $type_article->save();
        $article->type_articles_id=$type_article->id;





        $devis->duree_validité=$request->input('duree_validité');
        $devis->save();
        $article->devis_id=$devis->id;

        $facture->save();
        $article->facture_id=$facture->id;



        $article->quantité=$request->input('quantité');
        $article->prix_ht=$request->input('prix_ht');
        $article->tva=$request->input('tva');
        $article->reduction=$request->input('reduction');
        $article->total_ht=$request->input('total_ht');
        $article->total_ttc=$request->input('total_ttc');
        $article->description=$request->input('description');
        $article->save();
       




        return[
            ["article:" , $article],
            ["type_article:" , $type_article],
        ];

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

        $article=Article::find($id);
        $type_article=Type_article::find($id);

        $type_article->article_type_value=$request->input('article_type_value');
        $type_article->article_type_value_eng=$request->input('article_type_value_eng');
        $type_article->save();

        $article->quantité=$request->input('quantité');
        $article->prix_ht=$request->input('prix_ht');
        $article->tva=$request->input('tva');
        $article->reduction=$request->input('reduction');
        $article->total_ht=$request->input('total_ht');
        $article->total_ttc=$request->input('total_ttc');
        $article->description=$request->input('description');
        $article->type_articles()->associate($type_article)->save();

        return[
            ["article:" , $article],
            ["type_article:" , $type_article],
        ];

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
        $article=Article::find($id);
        $article->delete();
        return ["Deleted With Success"];

    }
}
