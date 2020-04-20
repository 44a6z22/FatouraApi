<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('type_articles_id');
            $table->foreign('type_articles_id')->references('id')->on('type_articles');
            $table->unsignedBigInteger('facture_id');
            $table->foreign('facture_id')->references('id')->on('factures');
            $table->unsignedBigInteger('devis_id');
            $table->foreign('devis_id')->references('id')->on('devis');

            
            $table->float('quantité');
            $table->float('prix_ht');	
            $table->float('tva');	
            $table->float('reduction');	
            $table->float('total_ht');	
            $table->float('total_ttc');	
            $table->text('description');
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
        Schema::dropIfExists('articles');
    }
}
