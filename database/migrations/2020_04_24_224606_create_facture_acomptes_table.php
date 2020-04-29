<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureAcomptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_acomptes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('devis_id');
            $table->foreign('devis_id')->references('id')->on('devis')->onDelete('cascade');

            $table->float('montant')->default(0);
            $table->float('tva')->default(0);

            $table->unsignedBigInteger('text_document_id');
            $table->foreign('text_document_id')->references('id')->on('text_documents')->onDelete('cascade');

            $table->unsignedBigInteger('reglement_id');
            $table->foreign('reglement_id')->references('id')->on('reglements')->onDelete('cascade');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete("cascade");

            $table->text("uid");
            $table->timestamp('payed_at')->nullable();
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
        Schema::dropIfExists('facture_acomptes');
    }
}
