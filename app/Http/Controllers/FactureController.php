<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Http\Resources\FactureResource;
use App\Reglement;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return FactureResource::collection(Facture::all());
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
        // //
        // $request->validate([
        //     "Condition_id" => 'required',
        //     "Mode_id" => 'required'
        // ]);


        // dd($request);
        $facture = new Facture();
        $facture->save();

        $Reglement = new Reglement();
        $Reglement->condition_reglement_id = $request->reglement["condition_id"];
        $Reglement->mode_reglement_id = $request->reglement['mode_id'];
        $Reglement->interet_retard_id = 1;
        $Reglement->facture_id = $facture->id;

        if (!$Reglement->save()) {
            $facture->delete();
        }

        return $facture;
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
        return new FactureResource(Facture::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$

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
        $facture = Facture::find($id);
        $facture->save();
        return $facture;
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
        $facture = Facture::find($id);
        $facture->delete();
    }
}
