<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MotClesAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('facture_mot_cle', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('facture_id')->nullable()->default(12);
            $table->unsignedBigInteger('mot_cle_id')->nullable()->default(12);

            $table->foreign("facture_id")->references("id")->on("factures")->onDelete("cascade");
            $table->foreign("mot_cle_id")->references("id")->on("mot_clés")->onDelete("cascade");


            $table->unique(["facture_id", "mot_cle_id"]);
            $table->timestamps();
        });

        Schema::create('devis_mot_cle', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('devis_id')->nullable()->default(12);
            $table->unsignedBigInteger('mot_cle_id')->nullable()->default(12);

            $table->foreign("devis_id")->references("id")->on("devis")->onDelete("cascade");
            $table->foreign("mot_cle_id")->references("id")->on("mot_clés")->onDelete("cascade");


            $table->unique(["devis_id", "mot_cle_id"]);
            $table->timestamps();
        });


        Schema::create('client_mot_cle', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('client_id')->nullable()->default(12);
            $table->unsignedBigInteger('mot_cle_id')->nullable()->default(12);

            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade");
            $table->foreign("mot_cle_id")->references("id")->on("mot_clés")->onDelete("cascade");

            $table->unique(["client_id", "mot_cle_id"]);
            $table->timestamps();
        });


        Schema::create('societe_mot_cle', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('societe_id')->nullable()->default(12);
            $table->unsignedBigInteger('mot_cle_id')->nullable()->default(12);

            $table->foreign("societe_id")->references("id")->on("societes")->onDelete("cascade");
            $table->foreign("mot_cle_id")->references("id")->on("mot_clés")->onDelete("cascade");


            $table->unique(["societe_id", "mot_cle_id"]);
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
        //
        Schema::dropIfExists('societe_mot_cle');
        Schema::dropIfExists('devis_mot_cle');
        Schema::dropIfExists('facture_mot_cle');
        Schema::dropIfExists('client_mot_cle');
        // Schema::dropIfExists('');
    }
}
