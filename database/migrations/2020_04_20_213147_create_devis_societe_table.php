<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisSocieteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis_societe', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('devis_id');
            $table->foreign('devis_id')->references('id')->on('devis');

            $table->unsignedBigInteger('societe_id');
            $table->foreign('societe_id')->references('id')->on('societes');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devis_societe');
    }
}
