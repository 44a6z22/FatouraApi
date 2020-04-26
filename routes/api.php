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
Route::get('/verify/{token}', 'VerifyController@VerifyEmail')->name('verify');

Route::post('password/create', 'PasswordResetController@create');
Route::get('password/find/{token}', 'PasswordResetController@find');
Route::post('password/reset', 'PasswordResetController@reset');


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
    Route::Resource("/facture-acompte", "FactureAcompteController");

    Route::Delete("factures/delete/physical/{id}", "FactureController@physicalDelete");

    // Downloading Pdfs 
    Route::get('/factures/{id}/download', 'FactureController@exportPdf');
    Route::get('/Devis/{id}/download', 'DevisController@exportPdf');
    Route::get('/facture-acompte/{id}/download', 'FactureAcompteController@exportPdf');
});



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
