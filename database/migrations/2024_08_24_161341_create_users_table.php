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
            $table->id(); // Colonne ID primaire
            $table->string('name'); // Colonne pour le nom de l'utilisateur
            $table->string('email')->unique(); // Colonne pour l'email (doit être unique)
            $table->timestamp('email_verified_at')->nullable(); // Colonne pour la vérification de l'email
            $table->string('password'); // Colonne pour le mot de passe
            $table->boolean('is_admin')->default(false); // Colonne pour vérifier si l'utilisateur est admin
            $table->rememberToken(); // Colonne pour les tokens de session
            $table->timestamps(); // Colonnes created_at et updated_at
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
