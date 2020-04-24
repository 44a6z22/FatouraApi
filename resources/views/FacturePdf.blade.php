@extends('index')


@section('content')
    <div class="row">
        <div class="col-md-5">
        <h2>Invoice {{$facture->id}}</h2>
        <h4>{{ date('m d, Y', strtotime($facture->created_at))}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Invoice {{$facture->user->name}}</p>
        </div>
        <div class="col-md-6">
            <p>Invoice {{$facture->client->Client_Nom}}</p>
        </div>
    </div>
@endsection