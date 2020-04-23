<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('societe_id')->nullable();
            $table->foreign('societe_id')->references('id')->on('societes');

            $table->text('Client_Nom');
            $table->text('Client_Prenom');
            $table->text('Client_Ville');
            $table->integer('Client_Code_Postal');
            $table->text('Client_Pays');
            $table->text('Client_Fonction');
            $table->text('Client_SiteInternet');
            $table->text('Client_Note');
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
        Schema::dropIfExists('clients');
    }
}
