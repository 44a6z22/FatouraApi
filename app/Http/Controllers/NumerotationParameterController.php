<?php

namespace App\Http\Controllers;

use App\NumerotationParameter;
use App\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NumerotationParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return NumerotationParameter::get()
            ->where('parameter_id', Auth::user()->parameteres->first()->id);
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

        $num = NumerotationParameter::MakeIfNotExist();
        $num->store($request);

        return $num;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NumerotationParameter  $numerotationParameter
     * @return \Illuminate\Http\Response
     */
    public function show(NumerotationParameter $numerotationParameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NumerotationParameter  $numerotationParameter
     * @return \Illuminate\Http\Response
     */
    public function edit(NumerotationParameter $numerotationParameter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NumerotationParameter  $numerotationParameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumerotationParameter $numerotationParameter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NumerotationParameter  $numerotationParameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumerotationParameter $numerotationParameter)
    {
        //
    }
}
