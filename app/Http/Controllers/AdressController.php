<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Http\Resources\AdressResource;
use Illuminate\Http\Request;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AdressResource::collection(Adress::All());
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adress  $adress
     * @return \Illuminate\Http\Response
     */
    public function show(Adress $adress)
    {
        //
        return new AdressResource($adress);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adress  $adress
     * @return \Illuminate\Http\Response
     */
    public function edit(Adress $adress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adress  $adress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adress $adress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adress  $adress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adress $adress)
    {
        //
    }
}
