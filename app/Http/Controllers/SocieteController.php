<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Http\Resources\SocieteResource;
use App\MotCle;
use App\Numtele;
use App\Societe;
use App\SocieteMotCle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return SocieteResource::collection(
            Societe::all()
                ->where("is_deleted", false)
                ->where("user_id", Auth::user()->id)
        );
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

        // add acompany . 
        $company = new Societe();
        $company->store($request);

        // add phone numbers 
        foreach ($request->phones as $phone) {
            $phoneNumber = new Numtele();
            $phoneNumber->store($phone["value"], null, $company->id);
        }

        // add Adresses 
        foreach ($request->phones as $adress) {
            $companyAdress = new Adress();
            $companyAdress->store($adress["value"], null, $company->id);
        }

        // add keywords.
        $kwds = [];
        foreach ($request->keywords as $kwd) {

            if (!in_array($kwd['value'], $kwds)) {

                array_push($kwds, $kwd['value']);
                $keywords = MotCle::makeIfNotExist($kwd['value'], $request->user_id);

                $companyKeyword = new SocieteMotCle();
                $companyKeyword->store($company->id, $keywords->id);
            }
        }

        return $company;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function show(Societe $societe)
    {
        //
        if ($societe->is_deleted) {
            abort(404);
        }
        return new SocieteResource($societe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function edit(Societe $societe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Societe $societe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Societe $societe)
    {
        //
        // Societe::destroy($societe->id);
        $societe->remove();
    }
}
