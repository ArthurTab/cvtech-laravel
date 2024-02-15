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
        Schema::create('competences', function (Blueprint $table) {
            $table->id()->comment('Identifiant d\'une compétence');
            $table->string('intitule', 120)->comment('Intitulé d\'une compétence');
            $table->text('description', 120)->comment('Court descriptif d\'une compétence');
            $table->timestamps(); // <- Timestamp permet la création de updatedat et createdat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competences');
    }
};
