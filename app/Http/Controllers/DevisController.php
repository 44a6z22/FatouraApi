<?php

namespace App\Http\Controllers;

use App\Devis;
use App\Http\Resources\DevisResource;
use App\Reglement;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $devis = Devis::all();
        return DevisResource::collection($devis);
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
        $devis = new Devis();
        $devis->duree_validite = $request->input('duree_validite');
        $devis->save();

        $reglement = new Reglement();
        $reglement->condition_reglement_id = $request->reglement["condition_id"];
        $reglement->mode_reglement_id = $request->reglement['mode_id'];
        $reglement->interet_retard_id = $request->reglement['interet_id'];
        $reglement->devis_id = $devis->id;
        $reglement->save();

        return new DevisResource($devis);
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
        new DevisResource(Devis::find($id)->first());
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
        $devis = Devis::find($id);
        $devis->duree_validité = $request->input('duree_validité');
        $devis->save();
        return $devis;
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
        $devis = Devis::find($id);
        $devis->delete();
        return ["deleted with success"];
    }
}
