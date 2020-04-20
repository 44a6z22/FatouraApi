<?php

namespace App\Http\Controllers;

use App\Type_article;
use Illuminate\Http\Request;

class TypArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type_article=Type_article::all();
        return $type_article;  
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
        $type_article=new Type_article();

        $type_article->article_type_value=$request->input('article_type_value');
        $type_article->article_type_value_eng=$request->input('article_type_value_eng');
        return[
            ["type_article:" , $type_article]
        ];
        $type_article->save();
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
        $type_article=Type_article::find($id);
        $type_article->article_type_value=$request->input('article_type_value');
        $type_article->article_type_value_eng=$request->input('article_type_value_eng');
        $type_article->save();
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
        $type_article=Type_article::find($id);
        $type_article->delete();
    }
}
