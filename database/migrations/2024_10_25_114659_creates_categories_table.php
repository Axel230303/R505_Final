<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
{
    // Désactiver les contraintes de clés étrangères
    Schema::disableForeignKeyConstraints();

    // Supprime la table 'categories'
    Schema::dropIfExists('categories');

    // Réactiver les contraintes de clés étrangères
    Schema::enableForeignKeyConstraints();
}


};
