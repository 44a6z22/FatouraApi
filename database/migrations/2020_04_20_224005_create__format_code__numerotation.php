<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatCodeNumerotation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Format_code_Numerotation', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('numerotation_id');
            $table->foreign('numerotation_id')->references('id')->on('numerotation_parameters');

            $table->unsignedBigInteger('formatcode_id');
            $table->foreign('formatcode_id')->references('id')->on('format_codes');


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
        Schema::dropIfExists('Format_code_Numerotation');
    }
}
