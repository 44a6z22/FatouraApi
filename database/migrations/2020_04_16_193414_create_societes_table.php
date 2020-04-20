<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('Societe_identifiant_fiscale');
            $table->text('Societe_identifiant_commun_entreprise');
            $table->text('Societe_Nom');
            $table->integer('Societe_Taxe_Professionelle');
            $table->text('Societe_Pays');
            $table->text('Societe_Note');
            $table->text('Societe_Ville');
            $table->text('Societe_Site_Internet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('societes');
    }
}
