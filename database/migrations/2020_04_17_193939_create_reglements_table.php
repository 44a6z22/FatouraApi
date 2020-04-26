<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReglementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglements', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('mode_reglement_id');
            $table->foreign('mode_reglement_id')->references('id')->on('mode_reglements')->onDelete('cascade');

            $table->unsignedBigInteger('condition_reglement_id');
            $table->foreign('condition_reglement_id')->references('id')->on('condition_reglements')->onDelete('cascade');

            $table->unsignedBigInteger('interet_retard_id');
            $table->foreign('interet_retard_id')->references('id')->on('interet_retards')->onDelete('cascade');

            $table->unsignedBigInteger('compte_bancaire_id')->nullable();
            $table->foreign('compte_bancaire_id')->references('id')->on('compte_bancaires')->onDelete('cascade');

            $table->unsignedBigInteger('devis_id')->nullable();
            $table->foreign('devis_id')->references('id')->on('Devis')->onDelete('cascade');

            $table->unsignedBigInteger('facture_id')->nullable();
            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');

            $table->unique(['facture_id', 'devis_id']);

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
        Schema::dropIfExists('reglements');
    }
}
