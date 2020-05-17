<?php

namespace App\Http\Controllers;

use App\Type_article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TypeArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $this->authorize('index', Type_article::class);

        // show the defaults Articles and the ones that been added by the logged user. 
        $type_article = DB::table('type_articles')
            ->where('user_id', '=', null)
            ->orWhere('user_id', '=', Auth::user()->id)
            ->get();

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

        // $this->authorize('create', Type_article::class);
        $type_article = new Type_article();
        $type_article->store($request);

        return $type_article;
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
        $type_article = Type_article::find($id);

        // check if this article is original. or a user created it. 
        if ($type_article->user == null) {
            return ["can't Update the default Articles."];
        }

        // if a user created it. make sure it's the same user that wanna delete it. 
        if ($type_article->user->id != Auth::user()->id) {
            return ["
                Can't Update this .
            "];
        }

        // when all verifications go well. Update the article type. 
        $type_article->store($request);

        return $type_article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get the Article type. 
        $type_article = Type_article::find($id);

        // check if this article is original. or a user created it. 
        if ($type_article->user == null) {
            return ["can't delete the default Articles."];
        }

        // if a user created it. make sure it's the same user that wanna delete it. 
        if ($type_article->user->id != Auth::user()->id) {
            return ["
                Can't delete this .
            "];
        }


        // when all verifications go well. delete the article type. 
        $type_article->delete();

        return ['deleted Successfuly'];
    }
}
