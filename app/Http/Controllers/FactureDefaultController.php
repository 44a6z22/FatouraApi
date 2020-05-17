<?php

namespace App\Http\Controllers;

use App\FactureDefault;
use App\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FactureDefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return FactureDefault::get()->where('parameter_id', Auth::user()->parameteres->first()->id);
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
        $defaults = FactureDefault::MakeIfNotExist();
        $defaults->store($request);

        return $defaults;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FactureDefault  $factureDefault
     * @return \Illuminate\Http\Response
     */
    public function show(FactureDefault $factureDefault)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FactureDefault  $factureDefault
     * @return \Illuminate\Http\Response
     */
    public function edit(FactureDefault $factureDefault)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FactureDefault  $factureDefault
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactureDefault $factureDefault)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FactureDefault  $factureDefault
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactureDefault $factureDefault)
    {
        //
    }
}
