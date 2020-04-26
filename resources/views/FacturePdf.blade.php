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
            {{-- <p>Invoice {{$facture->client->Client_Nom}}</p> --}}
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Prix ht</th>
                    <th>Tva</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facture->articles as $item)
                <tr>
                <td scope="row"> {{$item->quantité}}</td>
                    <td> {{$item->prix_ht}} </td>
                    <td> {{$item->tva}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection