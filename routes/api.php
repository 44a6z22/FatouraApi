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





Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');
    Route::resource('/articles', "ArticleController");
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
    Route::resource("societes", "SocieteController");

    Route::Delete("factures/delete/physical/{id}", "FactureController@physicalDelete");

    // Downloading Pdfs 
    Route::get('/factures/{id}/download', 'FactureController@exportPdf');
    Route::get('/Devis/{id}/download', 'DevisController@exportPdf');
});



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
