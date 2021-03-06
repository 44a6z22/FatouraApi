<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Client;
use App\ClientMotCle;
use App\Http\Resources\ClientResource;
use App\MotCle;
use App\Numtele;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ClientController extends Controller
{
    public function index()
    {
        return ClientResource::collection(
            Client::all()
                ->where('is_deleted', false)
                ->where('user_id', Auth::user()->id)
        );
    }


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

        $kwds = [];
        foreach ($request->motCles as $kwd) {

            if (!in_array($kwd['value'], $kwds)) {


                // a keyword already exist ? 
                // don't add it again to the keyword table.
                $keyword = MotCle::makeIfNotExist($kwd["value"], $request->user_id);

                $clientKeyword = new ClientMotCle();
                $clientKeyword->store($client->id, $keyword->id);
            }
        }

        return new ClientResource($client);
    }

    public function show(Client $client)
    {
        //
        if ($client->is_deleted) {
            abort(404);
        }
        return new ClientResource($client);
    }


    public function update(Request $request, Client $client)
    {
        $client->store($request);
    }


    public function destroy(Client $client)
    {
        $client->remove();
    }
}
