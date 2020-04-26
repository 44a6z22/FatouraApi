<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('text_document_id');
            $table->foreign('text_document_id')->references('id')->on('text_documents')->onDelete('cascade');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete("cascade");

            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete("cascade");

            $table->unsignedBigInteger('societe_id')->nullable();
            $table->foreign('societe_id')->references('id')->on('societes')->onDelete("cascade");

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");

            $table->boolean('is_finalised')->default(false);

            $table->boolean('is_deleted')->default(false);

            $table->timestamp('payed_at')->nullable();



            $table->unsignedBigInteger('facture_type_id')->unsigned();
            $table->foreign("facture_type_id")->references("id")->on("facture_types");

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
        Schema::dropIfExists('factures');
    }
}
