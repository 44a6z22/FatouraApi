<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->text('name');
            $table->text('email');
            $table->text('password');
            $table->text('User_Nom_Societe')->nullable();
            $table->text('User_Identifiant_Fiscale')->nullable();
            $table->text('User_Identifiant_Commun_Entreprise')->nullable();
            $table->text('User_Taxe_Professionnele')->nullable();
            $table->integer('User_Code_Postal')->nullable();
            $table->text('User_Ville')->nullable();
            $table->text('User_Site_Internet')->nullable();



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
        Schema::dropIfExists('users');
    }
}
