<?php

namespace App\Http\Controllers;

use App\Type_article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $type_article = Type_article::all()->where('user_id', Auth::user()->id);

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
        $type_article->store($request);
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

        $type_article = Type_article::find($id);
        if ($type_article->user->id != Auth::user()->id) {
            return ["
                Can't delete this .
            "];
        }
        $type_article->delete();
    }
}
