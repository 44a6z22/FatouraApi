<?php

namespace App\Http\Controllers;

use App\NumerotationParameter;
use App\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Parameter $parameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parameter $parameter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameter $parameter)
    {
        //
    }

    public function setNemurotation(Request $request)
    {
        $params = null;
        if (Parameter::get()->where('user_id', Auth::user()->id)->first() == null) {

            $params = new Parameter();
            $params->user_id = Auth::user()->id;
            $params->path = $request->path;
            $params->param_name = $request->name;
            $params->save();
        } else {
            $params = Parameter::get()->where('user_id', Auth::user()->id)->first();
        }

        $num = new NumerotationParameter();
        $num->parameter_id = $params->id;
        $num->format = $request->num["format"];
        $num->Min_compteur_valeur = $request->num["counter_init"];
        $num->save();

        return $num;
    }
}
