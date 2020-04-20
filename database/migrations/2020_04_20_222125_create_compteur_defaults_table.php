<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteurDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteur_defaults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parametre_id');
            $table->foreign('parametre_id')->references('id')->on('parameters');
            $table->integer('Facture');
            $table->integer('Devis');
            $table->integer('Avoir');
            $table->integer('Facture_Acompte');
            $table->integer('Avoir_Acompte');
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
        Schema::dropIfExists('compteur_defaults');
    }
}
