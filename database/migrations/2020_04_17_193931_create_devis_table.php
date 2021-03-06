<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('text_document_id');
            $table->foreign('text_document_id')->references('id')->on('text_documents');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger('societe_id')->nullable();
            $table->foreign('societe_id')->references('id')->on('societes');

            $table->text('uid');
            $table->integer('duree_validité');
            $table->float("total_ht");
            $table->float("total_ttc");
            $table->float("montant_tva");

            $table->boolean('is_refused')->default(false);
            $table->boolean('is_signed')->default(false);
            $table->boolean('is_finalised')->default(false);

            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('devis');
    }
}
