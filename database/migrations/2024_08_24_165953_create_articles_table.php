<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Colonne ID primaire
            $table->string('title'); // Colonne pour le titre
            $table->text('content'); // Colonne pour le contenu
            $table->string('image')->nullable(); // Colonne pour l'image (peut être null)
            $table->string('category')->nullable(); // Colonne pour la catégorie (peut être null)
            $table->timestamp('published_at')->nullable(); // Colonne pour la date de publication (peut être null)
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade'); // Clé étrangère vers la table users
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
        Schema::dropIfExists('articles');
    }
}
