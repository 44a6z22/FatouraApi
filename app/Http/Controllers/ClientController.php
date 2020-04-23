<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Client;
use App\ClientMotCle;
use App\Http\Resources\ClientResource;
use App\MotCle;
use App\Numtele;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ClientResource::collection(Client::all());
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

        // ddd($request);

        $client = new Client();
        $client->store($request);

        // adding a client adress
        foreach ($request->adresses as $adrs) {
            $adress = new Adress();
            $adress->store($adrs["value"], $client->id, null);
        }

        // adding a client phone number.
        foreach ($request->phones as $phone) {
            $phoneNumber = new Numtele();
            $phoneNumber->store($phone["value"], $client->id, null);
        }

        // add new keywords
        foreach ($request->motCles as $kwd) {

            // a keyword already exist ? 
            // don't add it again to the keyword table.

            $keyword = new MotCle();

            if ($keyword->isExist($kwd["value"]) == null) {
                $keyword->store($kwd["value"], $request->user_id);
            } else {
                $keyword = MotCle::where('Mot_de_value', $kwd['value'])->first();
            }


            $factureMotCle = new ClientMotCle();
            $factureMotCle->client_id = $client->id;
            $factureMotCle->mot_cle_id = $keyword->id;
            $factureMotCle->save();
        }

        return new ClientResource($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        return new ClientResource($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->store($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        Client::destroy($client->id);
    }
}
