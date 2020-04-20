<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumerotationParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numerotation_parameters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parametre_id');
            $table->foreign('parametre_id')->references('id')->on('parameters');
            $table->text('format');
            $table->integer('Min_compteur_valeur');
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
        Schema::dropIfExists('numerotation_parameters');
    }
}
