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

            $table->unsignedBigInteger('type_articles_id');
            $table->foreign('type_articles_id')->references('id')->on('type_articles');
            $table->unsignedBigInteger('facture_id')->nullable();
            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');
            $table->unsignedBigInteger('devis_id')->nullable();
            $table->foreign('devis_id')->references('id')->on('devis')->onDelete('cascade');


            $table->float('quantité')->default(0);
            $table->float('prix_ht')->default(0);
            $table->float('tva')->default(0);
            $table->float('reduction')->default(0);
            $table->float('total_ht')->default(0);
            $table->float('total_ttc')->default(0);
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
