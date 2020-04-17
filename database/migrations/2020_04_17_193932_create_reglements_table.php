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
            $table->unsignedBigInteger('mode_id');
            
            $table->foreign('mode_id')->references('id')->on('mode_reglements'); 
            $table->unsignedBigInteger('condition_id');
            $table->foreign('condition_id')->references('id')->on('condition_reglements');

            $table->unsignedBigInteger('inter_id');
            $table->foreign('inter_id')->references('id')->on('interet_retards');  

            $table->unsignedBigInteger('Compte_Bank_id');
            $table->foreign('Compte_Bank_id')->references('id')->on('compte_bancaires');  

            $table->unsignedBigInteger('devis_id');
            $table->foreign('devis_id')->references('id')->on('Devis');  

            $table->unsignedBigInteger('facture_id');
            $table->foreign('facture_id')->references('id')->on('factures');  


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
