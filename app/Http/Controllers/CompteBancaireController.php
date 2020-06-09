<?php

namespace App\Http\Controllers;

use App\Compte_bancaire;
use App\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompteBancaireController extends Controller
{
    public function index()
    {
        $compte_bancaire = Compte_bancaire::all()->where('user_id', Auth::user()->id);
        return $compte_bancaire;
    }

    public function store(Request $request)
    {
        $compte_bancaire = new Compte_bancaire();
        $compte_bancaire->store($request);
        return $compte_bancaire;
    }

    public function update(Request $request, $id)
    {
        //
        $compte_bancaire = Compte_bancaire::find($id);
        $compte_bancaire->store($request);
        return ["updated with success", $compte_bancaire];
    }

    public function destroy($id)
    {
        //
        $compte_bancaire = Compte_bancaire::find($id);
        $compte_bancaire->delete();
        return ["removed with success", $compte_bancaire];
    }
}
