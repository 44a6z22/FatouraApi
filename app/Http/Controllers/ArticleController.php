<?php

namespace App\Http\Controllers;

use App\Article;
use App\Devis;
use App\Facture;
use App\Type_article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    public function index()
    {
        //
        $article = Article::all();
        return $article;
    }



    public function store(Request $request)
    {
        //
        $article = new Article();
        $type_article = new Type_article();
        $facture = new Facture();
        $devis = new Devis();

        $type_article->article_type_value = $request->input('article_type_value');
        $type_article->article_type_value_eng = $request->input('article_type_value_eng');
        $type_article->save();
        $article->type_articles_id = $type_article->id;
        $devis->duree_validité = $request->input('duree_validité');
        $devis->save();
        $article->devis_id = $devis->id;
        $facture->save();

        $article->facture_id = $facture->id;
        $article->quantité = $request->input('quantité');
        $article->prix_ht = $request->input('prix_ht');
        $article->tva = $request->input('tva');
        $article->reduction = $request->input('reduction');
        $article->total_ht = $request->input('total_ht');
        $article->total_ttc = $request->input('total_ttc');
        $article->description = $request->input('description');
        $article->save();

        return [
            ["article:", $article],
            ["type_article:", $type_article],
        ];
    }





  
    public function update(Request $request, $id)
    {
        //

        $article = Article::find($id);
        $type_article = Type_article::find($id);

        $type_article->article_type_value = $request->input('article_type_value');
        $type_article->article_type_value_eng = $request->input('article_type_value_eng');
        $type_article->save();

        $article->quantité = $request->input('quantité');
        $article->prix_ht = $request->input('prix_ht');
        $article->tva = $request->input('tva');
        $article->reduction = $request->input('reduction');
        $article->total_ht = $request->input('total_ht');
        $article->total_ttc = $request->input('total_ttc');
        $article->description = $request->input('description');
        $article->type_articles()->associate($type_article)->save();

        return [
            ["article:", $article],
            ["type_article:", $type_article],
        ];
    }

    
    public function destroy($id)
    {
        //
        $article = Article::find($id);
        $article->delete();
        return ["Deleted With Success"];
    }
}
