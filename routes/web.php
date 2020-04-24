<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::resource('/reglement',"ReglementController");
// Route::resource('/mode_reglement',"ModeReglementController");
// Route::resource('/condition_reglement',"ConditionReglementController");
// Route::resource('/interet_retard',"InteretRetardController");
// Route::resource('/compte_bancaire',"CompteBancaireController");
// Route::resource('/devis',"DevisController");
// Route::resource('/factures',"FactureController");
// Route::resource('/article',"ArticleController");
// Route::resource('/type_article',"TypArticlesController");









Route::get('/', function () {
    return view('pdf');
});
