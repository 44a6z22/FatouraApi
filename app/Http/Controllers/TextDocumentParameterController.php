<?php

namespace App\Http\Controllers;

use App\Parameter;
use App\TextDocumentParameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TextDocumentParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return TextDocumentParameter::where('parameter_id', Auth::user()->parameteres->first()->id)->get();
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
        $textp = TextDocumentParameter::MakeIfNotExist($request->type_text_document_parameter_id);
        $textp->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TextDocumentParameter  $textDocumentParameter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return TextDocumentParameter::where('type_text_document_parameter_id', $id)->get()->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TextDocumentParameter  $textDocumentParameter
     * @return \Illuminate\Http\Response
     */
    public function edit(TextDocumentParameter $textDocumentParameter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TextDocumentParameter  $textDocumentParameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TextDocumentParameter $textDocumentParameter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TextDocumentParameter  $textDocumentParameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(TextDocumentParameter $textDocumentParameter)
    {
        //
    }
}
