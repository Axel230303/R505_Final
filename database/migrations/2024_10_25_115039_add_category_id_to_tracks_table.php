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
        Schema::table('tracks', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
        });
    }

    public function down(): void
{
    // Désactiver les contraintes de clés étrangères
    Schema::disableForeignKeyConstraints();

    Schema::table('tracks', function (Blueprint $table) {
        if (Schema::hasColumn('tracks', 'category_id')) {
            // Supprime la contrainte de clé étrangère
            $table->dropForeign(['category_id']);
            // Supprime la colonne 'category_id'
            $table->dropColumn('category_id');
        }
    });

    // Réactiver les contraintes de clés étrangères
    Schema::enableForeignKeyConstraints();
}

};
