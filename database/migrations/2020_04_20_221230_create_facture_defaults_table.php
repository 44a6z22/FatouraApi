<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_defaults', function (Blueprint $table) {
            $table->id();

            // fk
            $table->unsignedBigInteger('parameter_id')->default(1);
            $table->foreign('parameter_id')->references('id')->on('parameters');

            $table->unsignedBigInteger("type_article_id");
            $table->foreign("type_article_id")->references('id')->on('type_articles');

            $table->unsignedBigInteger('mode_reglement_id');
            $table->foreign('mode_reglement_id')->references('id')->on('mode_reglements')->onDelete('cascade');

            $table->unsignedBigInteger('condition_reglement_id');
            $table->foreign('condition_reglement_id')->references('id')->on('condition_reglements')->onDelete('cascade');

            $table->unsignedBigInteger('interet_retard_id');
            $table->foreign('interet_retard_id')->references('id')->on('interet_retards')->onDelete('cascade');

            // values
            $table->integer("tva_value")->default(20);
            $table->text("text_tva_on")->nullable();
            $table->text("text_tva_off")->nullable();

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
        Schema::dropIfExists('facture_defaults');
    }
}
