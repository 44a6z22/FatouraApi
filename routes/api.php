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
    Route::resource('/articles', "ArticleController");
    Route::resource('/type_articles', "TypeArticlesController");
    Route::resource("clients", "ClientController");
    Route::resource("societes", "SocieteController");
    Route::Resource("/roles", "RoleController");
    Route::Resource("/users", "UserController");

    Route::Resource("/factures-acompte", "FactureAcompteController");

    /// Facture Resource 
    Route::resource('/factures', "FactureController");
    Route::get('/factures/{id}/finalise', 'FactureController@finalise');
    Route::get('/factures/{id}/pay', 'FactureController@pay');
    Route::get('/factures/{id}/unpay', 'FactureController@unpay');
    Route::Delete("/factures/delete/physical/{id}", "FactureController@physicalDelete");
    Route::get('/factures/{id}/download', 'FactureController@exportPdf');


    // devis Resource
    Route::resource('/devis', "DevisController");
    Route::get('/devis/{id}/finalise', 'DevisController@finalise');
    Route::get('/devis/{id}/sign', 'DevisController@sign');
    Route::get('/devis/{id}/unsign', 'DevisController@unsign');
    Route::get('/devis/{id}/refuse', 'DevisController@refuse');
    Route::get('/devis/{id}/cancel-refuse', 'DevisController@cancelRefuse');
    Route::Delete("/devis/delete/physical/{id}", "DevisController@physicalDelete");
    Route::get('/devis/{id}/download', 'DevisController@exportPdf');


    // facture acomppte 
    Route::get('/factures-acompte/{id}/download', 'FactureAcompteController@exportPdf');
    Route::get('/factures-acompte/{id}/finalise', 'FactureAcompteController@finalise');
    Route::get('/factures-acompte/{id}/pay', 'FactureAcompteController@pay');
    Route::get('/factures-acompte/{id}/unpay', 'FactureAcompteController@unpay');


    // Uids Parameters 
    Route::post("/settings/uids", "NumerotationParameterController@store");
    Route::get("/settings/uids", "NumerotationParameterController@index");

    // bank Account Parameter
    Route::resource("settings/bankAccount", "CompteBancaireController");

    // General Preferences 
    Route::post('settings/general', "FactureDefaultController@store");
    Route::get('settings/general', "FactureDefaultController@index");

    // User Parameters
    Route::post("settings/change-password", "UserController@updatePassowrd");
    Route::post("settings/update-user", "UserController@update");
});
