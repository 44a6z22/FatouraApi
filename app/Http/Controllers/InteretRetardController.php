<?php

namespace App\Http\Controllers;

use App\Interet_retard;
use Illuminate\Http\Request;

class InteretRetardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $interet_ret=Interet_retard::all();
        return $interet_ret;    
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
        $interet_ret=new Interet_retard();
        $interet_ret->inter_value=$request->input('inter_value');
        $interet_ret->save();
        return $interet_ret;
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
        $interet_ret=Interet_retard::find($id);
        $interet_ret->inter_value=$request->input('inter_value');
        $interet_ret->save();
        return [$interet_ret,"Updated With Success"];
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
        $interet_ret=Interet_retard::find($id);
        $interet_ret->delete();
        return ('deleted with success');

    }
}
