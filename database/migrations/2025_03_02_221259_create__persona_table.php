<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_persona', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidoMat');
            $table->string('apellidoPat');
            $table->dateTime('fechaNacimiento');
            $table->json('datos_adicio'); // sexo, estado, ciudad, estudio, cargo 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_persona');
    }
};
