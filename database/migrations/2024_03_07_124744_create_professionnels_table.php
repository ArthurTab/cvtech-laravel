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
        Schema::create('professionnels', function (Blueprint $table) {
            $table->id()->comment('Identifiant du professionnel');
            $table->string('prenom', 25)->comment('Prénom du professionnel');
            $table->string('nom', 40)->comment('Nom du professionnel');
            $table->string('cp', 5)->comment('Code postal du professionnel');
            $table->string('ville', 38)->comment('Ville du professionnel');
            $table->string('telephone', 14)->comment('Téléphone du professionnel');
            $table->string('email', 191)->unique()->comment('Email du professionnel');
            $table->date('naissance', 191)->comment('Date de naissance du professionnel');
            $table->boolean('formation')->comment('Email du professionnel');
            $table->set('domaine', ['S', 'R', 'D'])->comment('Domaine d\'activité du professionnel');
            $table->string('source', 191)->nullable()->comment('Source du profil du professionnel');
            $table->text('observation')->nullable()->comment('Observation du professionnel');
            $table->unsignedBigInteger('metier_id');
            $table->foreign('metier_id')->references('id')->on('metiers')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professionnels');
    }
};
