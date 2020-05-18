<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextDocumentParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_document_parameters', function (Blueprint $table) {
            $table->id();
            //fk
            $table->unsignedBigInteger("parameter_id");
            $table->foreign("parameter_id")->references("id")->on("parameters");

            $table->unsignedBigInteger("type_text_document_parameter_id");
            $table->foreign("type_text_document_parameter_id")->references("id")->on("type_text_document_parameters");

            $table->unsignedBigInteger("amount_unit_id")->nullable();
            $table->foreign("amount_unit_id")->references("id")->on("amount_units");

            // values
            $table->integer("amount")->nullable();

            $table->boolean("is_name_shown")->default(true);
            $table->text("Introduction")->nullable();
            $table->text("Conclution")->nullable();
            $table->text("footer")->nullable();
            $table->text("condition_general")->nullable();

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
        Schema::dropIfExists('text_document_parameters');
    }
}
