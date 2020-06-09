<?php

namespace App\Http\Controllers;

use App\Compte_bancaire;
use App\Condition_reglement;
use App\Http\Resources\ReglementResource;
use App\Interet_retard;
use App\Mode_reglement;
use App\Reglement;
use Illuminate\Http\Request;

class ReglementController extends Controller
{
   
    public function index()
    {
        //
        return ReglementResource::collection(Reglement::all());
    }

   
    public function show(Reglement $reglement)
    {
        //
        return new ReglementResource($reglement);
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
