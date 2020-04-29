<?php

namespace App\Http\Controllers;

use App\Compte_bancaire;
use App\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompteBancaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $compte_bancaire = Compte_bancaire::all();
        return $compte_bancaire;
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
        $compte_bancaire = new Compte_bancaire();
        $compte_bancaire->user_id = Auth::user()->id;
        $compte_bancaire->IBAN = $request->input('IBAN');
        $compte_bancaire->BIC = $request->input('BIC');
        $compte_bancaire->Titulaire = $request->input('Titulaire');
        $compte_bancaire->Libelle_Du_Compte = $request->input('Libelle_Du_Compte');
        $compte_bancaire->save();
        return $compte_bancaire;
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
        $compte_bancaire = Compte_bancaire::find($id);
        $compte_bancaire->IBAN = $request->input('IBAN');
        $compte_bancaire->BIC = $request->input('BIC');
        $compte_bancaire->Titulaire = $request->input('Titulaire');
        $compte_bancaire->Libelle_Du_Compte = $request->input('Libelle_Du_Compte');
        $compte_bancaire->save();
        return ["updated with success", $compte_bancaire];
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
        $compte_bancaire = Compte_bancaire::find($id);
        $compte_bancaire->delete();
        return ["removed with success", $compte_bancaire];
    }
}
