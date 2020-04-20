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
            $table->text('User_Nom');	
            $table->text('User_Email');	
            $table->text('User_Password');	
            $table->text('User_Nom_Societe');	
            $table->text('User_Identifiant_Fiscale');	
            $table->text('User_Identifiant_Commun_Entreprise');	
            $table->text('User_Taxe_Professionnele');	
            $table->integer('User_Code_Postal');	
            $table->text('User_Ville');	
            $table->text('User_Site_Internet');	
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
