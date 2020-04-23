<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/reglement', "ReglementController");
Route::resource('/mode_reglement', "ModeReglementController");
Route::resource('/condition_reglement', "ConditionReglementController");
Route::resource('/interet_retard', "InteretRetardController");
Route::resource('/compte_bancaire', "CompteBancaireController");
Route::resource('/devis', "DevisController");
Route::resource('/factures', "FactureController");
Route::resource('/articles', "ArticleController");
Route::resource('/type_articles', "TypeArticlesController");
Route::resource("clients", "ClientController");






Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
