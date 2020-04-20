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

            $table->unsignedBigInteger('parametre_id');
            $table->foreign('parametre_id')->references('id')->on('parameters');

            $table->text('Text_intro');
            $table->text('Text_conclusion');
            $table->text('Text_piedPage');
            $table->text('Text_conditionGeneral');
            $table->boolean('Afficher_le_nom');
            $table->boolean('Cacher_bloc_signature');
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
