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
        Schema::create('classe_etudiant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('classe_id');
            $table->string('annee_academique'); // Ajoutez cette colonne
            $table->timestamps();
    
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
            $table->foreign('classe_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_etudiant');
    }
};
