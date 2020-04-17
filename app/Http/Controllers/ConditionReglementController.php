<?php

namespace App\Http\Controllers;

use App\Condition_reglement;
use Illuminate\Http\Request;

class ConditionReglementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $condition_reg=Condition_reglement::all();
        return $condition_reg;

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
         $condition_reg=new Condition_reglement();
         $condition_reg->Condition_value=$request->input('Condition_value');
         $condition_reg->save();
        return  $condition_reg;
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
        $condition_reg=Condition_reglement::find($id);
        $condition_reg->Condition_value=$request->input('Condition_value');
        $condition_reg->save();
        return [$condition_reg,"Updated With Success"];
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
        $condition_reg=Condition_reglement::find($id);
        $condition_reg->delete();
        return ["Deleted With Success"];


    }
}
